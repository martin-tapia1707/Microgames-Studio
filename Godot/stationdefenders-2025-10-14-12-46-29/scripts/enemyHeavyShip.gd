extends CharacterBody2D

@export var bullet_scene: PackedScene

@onready var fireSound = $fireSound
@onready var fireAnimation: AnimationPlayer = $Sprite2D/AnimationPlayer
@onready var shootTimer: Timer = $ShootTime
@onready var shield1: Node2D = $shield
@onready var shield2: Node2D = $shield2

var speed: float = 200
var health: int = 3
var player: Node2D = null  
var can_move: bool = true

func _ready():
	add_to_group("shootingEnemies")
	var players = get_tree().get_nodes_in_group("player")
	if players.size() > 0:
		player = players[0] 

	shootTimer.wait_time = 4
	shootTimer.one_shot = false
	shootTimer.stop()
	shootTimer.timeout.connect(_on_ShootTimer_timeout)

func _physics_process(delta) -> void:
	if player == null:
		return

	if can_move:
		var direction = (player.global_position - global_position).normalized()
		velocity = direction * speed
		move_and_slide()
	else:
		velocity = Vector2.ZERO

	look_at(player.global_position)

func shoot_bullet():
	if player == null:
		return
	fireSound.play()
	var bullet = bullet_scene.instantiate()
	get_tree().current_scene.add_child(bullet)
	bullet.global_position = global_position
	bullet.bullet_direction = (player.global_position - global_position).normalized()
	fireAnimation.play("fire")

func _on_ShootTimer_timeout():
	shoot_bullet()

func start_shooting():
	can_move = false
	await get_tree().create_timer(4.0).timeout
	shoot_bullet()
	shootTimer.start() 

func stop_shooting():
	can_move = true
	shootTimer.stop()

func _on_area_2d_area_entered(area: Area2D) -> void:
	if area.is_in_group("playerBullets"):
		health -= 1
		if health <= 0: 
			destroy_enemy()
			GlobalScore.playerScore += GlobalScore.enemyHeavyShip_score
			GlobalScore.currentEnemies -= 1

func _on_shield_area_entered(area: Area2D) -> void:
	if area.is_in_group("playerBullets"):
		area.queue_free()
		health -= 1
		shield1.queue_free()

func _on_shield_2_area_entered(area: Area2D) -> void:
	if area.is_in_group("playerBullets"):
		area.queue_free()
		health -= 1
		shield2.queue_free()

func destroy_enemy():
	queue_free()

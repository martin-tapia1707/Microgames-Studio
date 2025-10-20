extends Node2D

@onready var spawn_timer: Timer = $SpawnTimer
@onready var healSound = $"../healSound"

@export var dificultScene: PackedScene
@export var spawn_points: Array[Node2D] = []
@export var enemy_list: Array[PackedScene] 

var difficulty_value: float = 1.0

func _ready() -> void:
	spawn_timer.timeout.connect(Callable(self, "_on_spawn_timer_timeout"))

func _process(_delta: float) -> void:
	update_difficulty()
	
func healPlayer():
	GlobalScore.playerHP += 5

func update_difficulty() -> void:
	var score = GlobalScore.playerScore
	var new_level = 1

	if score >= 15000:
		new_level = 5

	elif score >= 8000:
		new_level = 4

	elif score >= 4000:
		new_level = 3

	elif score >= 1000:
		new_level = 2

	if new_level != GlobalScore.current_difficulty_level:
		GlobalScore.current_difficulty_level = new_level
		adjust_spawn_settings(new_level)
		show_difficulty_message(new_level)
		
		if GlobalScore.playerHP < 100:
			healPlayer()
			healSound.play()

func adjust_spawn_settings(level: int) -> void:
	match level:
		1:
			GlobalScore.maxEnemyScreen = 10
			spawn_timer.wait_time = 1
		
		2:
			GlobalScore.maxEnemyScreen = 15
			spawn_timer.wait_time = 1.7
		3:
			GlobalScore.maxEnemyScreen = 20
			spawn_timer.wait_time = 1.4
		4:
			GlobalScore.maxEnemyScreen = 30
			spawn_timer.wait_time = 1.1
		5:
			GlobalScore.maxEnemyScreen = 40
			spawn_timer.wait_time = 0.9

func show_difficulty_message(level: int) -> void:
	var dificultMessage = dificultScene.instantiate()
	dificultMessage.get_node("CanvasLayer/HBoxContainer/difficulty").text = str(GlobalScore.current_difficulty_level)
	get_tree().current_scene.add_child(dificultMessage)
	print("Dificultad: " + str(GlobalScore.current_difficulty_level))
	
	if GlobalScore.playerHP < 100:
		healSound.play()

func _on_spawn_timer_timeout() -> void:
	if GlobalScore.currentEnemies >= GlobalScore.maxEnemyScreen:
		return
	
	var spawn_point = spawn_points[randi() % spawn_points.size()]
	
	# Elegimos enemigo según dificultad
	var possible_enemies: Array[PackedScene] = []
	if GlobalScore.current_difficulty_level == 1:
		# Solo enemigos base
		for e in enemy_list:
			if e.resource_path.ends_with("enemyBaseShip.tscn"):
				possible_enemies.append(e)
	else:
		# Todos los enemigos disponibles
		possible_enemies = enemy_list.duplicate()
	
	var enemy_scene = possible_enemies[randi() % possible_enemies.size()]

	var enemy_instance = enemy_scene.instantiate()
	enemy_instance.position = spawn_point.position
	enemy_instance.connect("tree_exited", Callable(self, "_on_enemy_removed"))

	get_tree().current_scene.add_child(enemy_instance)
	GlobalScore.currentEnemies += 1


func _on_enemy_removed() -> void:
	GlobalScore.currentEnemies -= 1

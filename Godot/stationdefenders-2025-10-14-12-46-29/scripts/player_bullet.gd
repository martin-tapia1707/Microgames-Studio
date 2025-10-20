class_name bullet

extends Area2D

@onready var animation = $AnimatedSprite2D

var bullet_speed:float = 400 
var bullet_damage:int = 1 
var bullet_direction:Vector2 = Vector2.ZERO 

func _ready() -> void:
	add_to_group("playerBullets")
	animation.play("default")

func _process(delta):
	position += bullet_direction * bullet_speed * delta 

func _on_body_entered(body: Node2D) -> void:
	if body.is_in_group("Enemies") or body.is_in_group("shootingEnemies") or body.is_in_group("kamikazeEnemies"):
		queue_free()
		

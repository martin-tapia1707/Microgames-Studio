extends Area2D

var speed: float = 200
var bullet_direction: Vector2 = Vector2.ZERO
var rotated := false

func _ready() -> void:
	add_to_group("enemyBullet")
	$AnimatedSprite2D.play("moving")

func _process(delta):
	if not rotated and bullet_direction != Vector2.ZERO:
		look_at(global_position + bullet_direction)
		rotated = true

	position += bullet_direction * speed * delta

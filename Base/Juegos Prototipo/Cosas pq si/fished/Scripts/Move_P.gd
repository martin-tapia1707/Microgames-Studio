extends CharacterBody2D

@export var velocidad: float

func _physics_process(delta: float) -> void:
	var direccion = Vector2.ZERO

	if Input.is_action_pressed("ui_right"):
		direccion.x += 1
	if Input.is_action_pressed("ui_left"):
		direccion.x -= 1

	direccion = direccion.normalized()
	velocity = direccion * velocidad
	move_and_slide()

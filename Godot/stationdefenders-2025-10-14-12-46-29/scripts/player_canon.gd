class_name canon_player

extends Area2D

@export var bullet_scene: PackedScene

@onready var fireAnimation: AnimationPlayer = $AnimationPlayer
@onready var shotSound = $"../ShotSound"
@onready var muzzle: Node2D = $Muzzle

func _ready():	
	pass  # ya no hace falta reasignar muzzle porque usamos @onready

func _process(delta): 
	# Esto hace que el cañón apunte a la posición del cursor
	look_at(get_global_mouse_position())
	
func _input(event):
	if event is InputEventMouseButton and event.pressed:
		if event.button_index == MOUSE_BUTTON_LEFT:
			shoot()
			
func shoot():

	shotSound.play()

	# --- DISPARO DE LA BALA ---
	var bullet = bullet_scene.instantiate()
	get_tree().current_scene.add_child(bullet)
	bullet.position = muzzle.global_position
	bullet.bullet_direction = (get_global_mouse_position() - muzzle.global_position).normalized()
	fireAnimation.play("fire")
	
func _on_animated_sprite_2d_animation_finished() -> void:
	$AnimatedSprite2D.stop()

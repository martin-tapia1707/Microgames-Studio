extends CharacterBody2D

@export var canon_scene: PackedScene

func _ready():
	add_to_group("player")

	print("Vida inicial del jugador:", GlobalScore.playerMaxHealth)
	var canon = canon_scene.instantiate()
	add_child(canon)

	
func _on_area_2d_body_entered(body: Node2D) -> void:
	if body.is_in_group("Enemies"):
		print("Choque")
		GlobalScore.playerHP -= 1
		GlobalScore.currentEnemies -= 1
		body.queue_free()
		
	if body.is_in_group("kamikazeEnemies"):
		print("Choque")
		GlobalScore.playerHP -= 10
		GlobalScore.currentEnemies -= 1
		body.queue_free()
		
func _on_area_2d_area_entered(area: Area2D) -> void:
	if area.is_in_group("enemyBullet"):
		GlobalScore.playerHP -= 1
		area.queue_free()

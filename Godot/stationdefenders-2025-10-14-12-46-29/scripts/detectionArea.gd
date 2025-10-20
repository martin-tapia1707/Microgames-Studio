extends Area2D

func _ready() -> void:
	add_to_group("detectionArea")

func _on_body_entered(body: Node2D) -> void:
	if body.is_in_group("shootingEnemies"):
		body.start_shooting() 

func _on_body_exited(body: Node2D) -> void:
	if body.is_in_group("shootingEnemies"):
		body.stop_shooting() 

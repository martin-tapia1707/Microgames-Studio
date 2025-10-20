extends Control

func _ready():
	process_mode = Node.PROCESS_MODE_ALWAYS
	visible = true

func _on_continue_pressed():
	get_tree().paused = false
	queue_free()

func _on_restart_pressed():
	get_tree().paused = false
	GlobalScore.reset_values()
	get_tree().change_scene_to_file("res://scenes/main_game.tscn")

func _on_volume_pressed():
	print("Abrir menú de volumen (opcional)")

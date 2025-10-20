extends Control

@onready var deadOST = $deadOST

func _ready() -> void:
	deadOST.play()

func _on_return_pressed() -> void:
	get_tree().change_scene_to_file("res://scenes/mainMenu.tscn")

func _on_return_2_pressed() -> void:
	GlobalScore.reset_values()
	get_tree().change_scene_to_file("res://scenes/main_game.tscn")

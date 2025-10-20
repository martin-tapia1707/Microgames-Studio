extends Control

@onready var animatedLogo = $MainMenuLogo/AnimationPlayer
@onready var buttonSound = $buttonPress

func _process(delta: float) -> void:
	animatedLogo.play("breathingLogo")

func _on_play_pressed() -> void:
	buttonPressed()
	await buttonSound.finished
	get_tree().change_scene_to_file("res://scenes/main_game.tscn")

func _on_options_pressed() -> void:
	buttonPressed()
	await buttonSound.finished
	get_tree().change_scene_to_file("res://scenes/mainMenuOptions.tscn")

func _on_quit_pressed() -> void:
	buttonPressed()
	await buttonSound.finished
	get_tree().quit()

func buttonPressed():
	buttonSound.play()

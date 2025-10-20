extends Node2D

@onready var inGameOst: AudioStreamPlayer2D = $inGameOst1
@export var pause_menu_scene: PackedScene
@export var dead_scene: PackedScene
@export var player_scene: PackedScene

var pause_menu: Control
var player

func _ready():
	var cursor_texture = load("res://assets/sprites/player/player_UI/player_HUD/crossHair.png")
	Input.set_custom_mouse_cursor(cursor_texture)

	var screen_size = get_viewport_rect().size
	player = player_scene.instantiate()
	add_child(player)
	player.position = screen_size / 2
	
	inGameOst.play()

func _process(_delta):
	if GlobalScore.playerHP <= 0:
		inGameOst.stop()
		get_tree().change_scene_to_file("res://scenes/deadScene.tscn")

	# Si presiona ESC
	if Input.is_action_just_pressed("ui_cancel"):
		_toggle_pause()


func _toggle_pause():
	if get_tree().paused:
		# Quitar pausa
		get_tree().paused = false
		if pause_menu:
			pause_menu.queue_free()
	else:
		# Poner en pausa
		get_tree().paused = true
		pause_menu = pause_menu_scene.instantiate()
		add_child(pause_menu)

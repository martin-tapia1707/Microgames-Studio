extends Control

@onready var healPlayer: RichTextLabel = $CanvasLayer/healPlayer

func _ready() -> void:
	if GlobalScore.playerHP < 100:
		healPlayer.visible = true
	else:
		healPlayer.visible = false

	await get_tree().create_timer(2.0).timeout
	queue_free()

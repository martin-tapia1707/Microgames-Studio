extends Control

@onready var playerScore: Label = $CanvasLayer/HBoxContainer/score
@onready var playerHealth_Label: Label = $CanvasLayer/HBoxContainer2/playerHealth
@onready var animatedADN = $CanvasLayer/HBoxContainer2/animatedADN
var last_score := -1

func _process(delta: float) -> void:
	if GlobalScore.playerScore != last_score:
		playerScore.text = str(GlobalScore.playerScore)
		last_score = GlobalScore.playerScore

	playerHealth_Label.text = str(GlobalScore.playerHP)
	animatedADN.play("default")

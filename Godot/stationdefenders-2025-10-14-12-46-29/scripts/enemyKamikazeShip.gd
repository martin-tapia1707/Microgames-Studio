extends CharacterBody2D

var speed: float = 300

var player: Node2D = null  

func _ready(): 
	add_to_group("kamikazeEnemies")
	var players = get_tree().get_nodes_in_group("player")
	if players.size() > 0:
		player = players[0] 

func _physics_process(delta) -> void:
	if player == null:
		return
		
	var direction = (player.global_position - global_position).normalized()
	
	velocity = direction * speed
	move_and_slide()

	look_at(player.global_position)

func _on_area_2d_area_entered(area: Area2D) -> void:
	if area.is_in_group("playerBullets"):
		destroy_enemy()
		GlobalScore.playerScore += GlobalScore.enemyKamikazeShip_score
		GlobalScore.currentEnemies -= 1
		
func destroy_enemy():
	queue_free() 

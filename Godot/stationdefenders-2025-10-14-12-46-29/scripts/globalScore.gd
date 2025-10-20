extends Node

#Enemigos puntajes
var enemyHeavyShip_score: int = 30
var enemyBaseShip_score: int = 10
var enemyKamikazeShip_score: int = 20

#Jugador estadisticas
var playerMaxHealth: int = 100
var playerHP: int = 100
var maxPlayerScore: int
var playerScore: int = 0

#Enemigos
var maxEnemyScreen: int = 1
var currentEnemies: int 

#Sistema de dificultad
var current_difficulty_level: int = 1

#Resetear valores al reiniciar el juego
func reset_values():
	playerHP = playerMaxHealth
	playerScore = 0
	currentEnemies = 0
	current_difficulty_level = 1

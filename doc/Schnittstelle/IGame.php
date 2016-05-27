<?php

namespace app\models;

/**
 * Das IGame Interface beschreibt das Interface, das zum implementieren 
 * der Studienarbeit verwendet wird, um ein einheitliches Aufrufen aller
 * Spiele zu gewährleisten
 * 
 * Spiele werden benannt nach dem Schema: Game<Team-Id>-<Interne Nummer>
 * zb Game21-1 für erstes Spiel Gruppe 21
 * 
 * 
 * @author David Karger
 */
interface IBasicGame {
    /**
     * Die initGame Methode kümmert sich um die Vorbereitung des Spieles,
     * zum Beispiel Vorbelegung der Werte
     */
    function initGame($level = 1, $numEx = 1);
    
    /**
     * Die verifyAnswers Methode muss die vom Nutzer eingegebenen 
     * Werte überprüfen
     * 
     * @returns Gibt Fehlerstring zurück, wenn Antworten inkorrekt, ansonsten leeren String
     */
    function verifyAnswers();
}

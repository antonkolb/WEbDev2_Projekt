<?php

namespace frontend\models\main;

/**
 * Das IGame Interface beschreibt das Interface, das zum implementieren 
 * der Studienarbeit verwendet wird, um ein einheitliches Aufrufen aller
 * Spiele zu gewäleisten
 * 
 * Spiele werden benannt nach dem Schema: Game<Team-Id>-<Interne Nummer>
 * zb Game21-1 fuer erstes Spiel Gruppe 21
 * 
 * 
 * @author David Karger
 * @edited by Anton Kolb (comments only)
 */

interface IBasicGame {
    /**
     * Die initGame Methode kuemmert sich um die Vorbereitung des Spieles,
     * zum Beispiel Vorbelegung der Werte
     */
    function initGame($level = 1, $numEx = 1);
    
    /**
     * Die verifyAnswers Methode muss die vom Nutzer eingegebenen 
     * Werte ueberpruefen
     * @return Gibt Fehlerstring zurueck wenn Antworten inkorrekt, ansonsten leeren String
     */
    function verifyAnswers();
}


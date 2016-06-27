<?php

namespace frontend\models\main;

/**
 * Das IAdvancedGame Interface beschreibt eine Zukunftsorientierte 
 * Variante des IGame Interface, daher wird von diesem geerbt, da mindestens auch
 * die dort beschriebenen Methoden implementiert sein muessen um eine volle 
 * Kompatibilitaet zu gewaehrleisten
 * 
 * Die Nutzerid soll immer mit ins Model uebertragen werden
 * 
 * @author David Karger
 * @edited by Anton Kolb (comments only)
 */
interface IAdvancedGame extends IBasicGame {
    
    /**
     * Liefert eine gerundete Prozentzahl zurueck wie weit der Nutzer
     * im Spiel fortgeschritten ist
     * 
     */
    function getProgress();
    
    /**
     * Registriet einen gemachten Versuch
     */
    function addTry();
    
    /**
     * Gibt die Anzahl der Versuche zurueck, die mit addTry rgistriert wurden
     */
    function getTries();

    /**
     * Setzt den Zahlenraum in dem gerechnet werden soll,
     * zum Beispiel kann im Menue die Schwierigkeit hochgezaehlt werden.
     * 
     * @param type $minimumNumber
     * @param type $maximumNumber
     */
    function setNumberRange($minimumNumber, $maximumNumber);
    
    
    /**
     * Speichert den aktuellen Fortschritt des Spieler, z.B in welchem Level mit
     * wie viel Prozent richtigen Antworten
     */
    function saveCurrentState();
    
    
    
}


<?php


namespace app\models;

/**
 * Das IAdvancedGame Interface beschreibt eine Zukunftsorientierte 
 * Variante des IGame Interface, daher wird von diesem geerbt, da mindestens auch
 * die dort beschriebenen Methoden implementiert sein müssen, um eine volle 
 * Kompatibilität zu gewährleisten
 * 
 * Die Nutzerid soll immer mit ins Model übertragen werden
 * 
 * @author David Karger
 */
interface IAdvancedGame extends IBasicGame {
    
    /**
     * Leifert eine gerundete Prozentzahl zurück, wie weit der Nutzer
     * im Spiel fortgeschritten ist
     * 
     */
    function getProgress();
    
    /**
     * Registriet einen gemachten Versuch
     */
    function addTry();
    
    /**
     * Gibt die Anzahl der Versuche zurück, die mit addTry rgistriert wurden
     */
    function getTries();
    /**
     * Setzt den Zahlenraum in dem gerechnet werden soll,
     * zum Beispiel kann im Menü dann die Schwierigkeit hochgezählt werden.
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

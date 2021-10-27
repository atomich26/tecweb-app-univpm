<?php

return [

    /*
     * Default classes for each table parts.
     */
    'classes' => [
        'container' => ['table-responsive'],
        'table' => ['table-striped', 'table-hover'],
        'tr' => [],
        'th' => ['align-middle'],
        'td' => ['align-middle'],
        'results' => ['table-dark', 'font-weight-bold'],
        'disabled' => ['table-danger', 'disabled'],
    ],

    /*
     * Table action icons are defined here.
     */
    'icon' => [
        'rowsNumber' => '<i class="bi bi-list-ol"></i>',
        'sort' => '<i class="bi bi-funnel-fill"></i>',
        'sortAsc' => '<i class="bi bi-caret-up-fill"></i>',
        'sortDesc' => '<i class="bi bi-caret-down-fill"></i>',
        'search' => '<i class="bi bi-search"></i>',
        'validate' => '<i class="bi bi-arrow-right-circle"></i>',
        'info' => '<i class="bi bi-info-circle"></i>',
        'cancel' => '<i class="bi bi-x-circle"></i>',
        'create' => '<i class="bi bi-plus-square"></i>',
        'edit' => '<i class="bi bi-pencil-square"></i>',
        'destroy' => '<i class="bi bi-trash"></i>',
        'show' => '<i class="bi bi-eye"></i>',
        'empty' => '<i class="bi bi-exclamation-diamond"></i>',
        'back' => '<i class="bi bi-chevron-left"></i>',
    ],

    /*
     * Default table values
     */
    'value' => [
        'rowsNumber' => 10,
        'rowsNumberSelectionActivation' => true,
    ],

    /*
     * Default template paths for each table parts.
     */
    'template' => [
        'table' => 'bootstrap.table',
        'thead' => 'bootstrap.thead',
        'tbody' => 'bootstrap.tbody',
        'results' => 'bootstrap.results',
        'tfoot' => 'bootstrap.tfoot',
    ],

    /**
     * Icons for the tables
     */

     'table-icon' => [
         'prodotti' => '<i class="bi bi-box-seam"></i>', 
         'utenti' => '<i class="bi bi-people"></i>',
         'centri-assistenza'=> '<i class="bi bi-headset"></i>',
         'faq' => '<i class="bi bi-question-circle"></i>' ,
         'malfunzionamenti' => '<i class="bi bi-x-octagon-fill"></i>',
         'soluzioni' => '<i class="bi bi-tools"></i>',
     ],

];

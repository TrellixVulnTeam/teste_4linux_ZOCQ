<?php

namespace App\Http\COntrollers;

use Illuminate\Http\Request;

class Rooms extends Controller {

    function list(

        $salas = []

        $sala[0]['nome'] = "A101"
        $sala[0]['horario'] = "Manhã"
        $sala[0]['disp'] = true

        $sala[1]['nome'] = "A101"
        $sala[1]['horario'] = "Tarde"
        $sala[1]['disp'] = true

        $sala[2]['nome'] = "A101"
        $sala[2]['horario'] = "Noite"
        $sala[2]['disp'] = false

        $sala[3]['nome'] = "A102"
        $sala[3]['horario'] = "Manhã"
        $sala[3]['disp'] = false

        $sala[4]['nome'] = "A102"
        $sala[4]['horario'] = "Tarde"
        $sala[4]['disp'] = false

        $sala[5]['nome'] = "A102"
        $sala[5]['horario'] = "Noite"
        $sala[5]['disp'] = true

        $sala[6]['nome'] = "A103"
        $sala[6]['horario'] = "Manhã"
        $sala[6]['disp'] = true

        $sala[7]['nome'] = "A103"
        $sala[7]['horario'] = "Tarde"
        $sala[7]['disp'] = false

        $sala[8]['nome'] = "A103"
        $sala[8]['horario'] = "Noite"
        $sala[8]['disp'] = true

        $sala[9]['nome'] = "B101"
        $sala[9]['horario'] = "Manhã"
        $sala[9]['disp'] = true

        $sala[10]['nome'] = "B101"
        $sala[10]['horario'] = "Tarde"
        $sala[10]['disp'] = false

        $sala[11]['nome'] = "B101"
        $sala[11]['horario'] = "Noite"
        $sala[11]['disp'] = false

        $sala[12]['nome'] = "B102"
        $sala[12]['horario'] = "Manhã"
        $sala[12]['disp'] = false

        $sala[13]['nome'] = "B102"
        $sala[13]['horario'] = "Tarde"
        $sala[13]['disp'] = false

        $sala[14]['nome'] = "B102"
        $sala[14]['horario'] = "Noite"
        $sala[14]['disp'] = false

        $sala[15]['nome'] = "B103"
        $sala[15]['horario'] = "Manhã"
        $sala[15]['disp'] = false

        $sala[16]['nome'] = "B103"
        $sala[16]['horario'] = "Tarde"
        $sala[16]['disp'] = true

        $sala[17]['nome'] = "B103"
        $sala[17]['horario'] = "Noite"
        $sala[17]['disp'] = false

        echo json_encode(['data' => $sala])

    )

}
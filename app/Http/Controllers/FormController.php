<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function show($id) {
        $form = Form::whereLink($id)->get()->first();
        $fields = $form->fields;

        return view('form.show', compact('form', 'fields'));
    }

    public function create() {
        $data = request(['title', 'fields', 'regex']);

        $form = Form::create(["title" => $data["title"]]);

        $size = count($data["fields"]);

        for($i = 0; $i < $size; ++$i) {
            Field::create([
                "title" => $data["fields"][$i],
                "regex" => $data["regex"][$i] ?? '/.*/',
                "form_id" => $form->id]);
        }

        return redirect()->action(
            [AnswerersController::class, 'index'], ['id' => $form->id]
        );
    }
}

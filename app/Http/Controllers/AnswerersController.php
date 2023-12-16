<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Answerer;
use App\Models\Field;
use App\Models\Form;
use Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AnswerersController extends Controller
{
    public function index($id) {
        $answerersRows = Answerer::whereFormId($id)->get();

        $answerers = [];

        foreach ($answerersRows as $answerer) {
            $answererRow = [];

            foreach ($answerer->answers as $answer) {
                $answererRow[] = [
                    'fieldTitle' => $answer->field->title,
                    'answer' => $answer->answer
                ];
            }

            $answerers[] = $answererRow;
        }

        $form = Form::find($id);
        $answeringId = $form->link;

        return view('answerer.index', compact('answerers', 'answeringId'));
    }

    public function create()
    {
        $data = request(['formId', 'answers', 'fieldIds']);

        $answers = array_map(function ($item1, $item2) {
            return array_merge([$item1], [$item2]);
        }, $data["fieldIds"], $data["answers"]);

        try {
            // Validation rules array
            $validationRules = [];

            // Dynamic validation rules for each answer
            foreach ($answers as $index => $answer) {
                $field = Field::find($answer[0]);

                if ($field) {
                    $pattern = $this->wrapRegexWithDelimiters($field->regex);

                    $validationRules["answers.$index"] = [
                        'required',
                        "regex:$pattern",
                    ];

                    // Custom error message for the regex rule
                    $customMessages["answers.$index.regex"] = "The answer for $field->title is in invalid format";
                }
            }

            // Validate the request data with custom error messages
            $validator = Validator::make($data, $validationRules, $customMessages ?? []);

            if ($validator->fails()) {
                // Redirect back to the form with validation errors
                return Redirect::back()->withErrors($validator)->withInput();
            }
        } catch (ValidationException $e) {
            // Handle validation failure
            return response()->json(['errors' => $e->validator->errors()], 422);
        }

        // Create Answerer
        $answerer = Answerer::create(["form_id" => $data["formId"]]);

        // Create Answers
        foreach ($answers as $answer) {
            Answer::create([
                "answer" => $answer[1],
                "field_id" => $answer[0],
                "answerer_id" => $answerer->id,
            ]);
        }

        return view('thankyou');
    }

    private function wrapRegexWithDelimiters($regex)
    {
        // Add delimiters to the regex pattern
        return '/' . str_replace('/', '\/', $regex) . '/';
    }
}

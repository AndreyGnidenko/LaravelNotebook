<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Requests\PhoneRecordAddRequest;
use App\Http\Requests\PhoneRecordModifyRequest;
use App\PhoneRecord as PhoneRecord;
use Illuminate\Http\Request;

class PhoneBookController extends Controller
{
    private function createValidator ($request)
    {
        $rules = [
            'fio' => 'required',
            'phonenum' =>
                ['required', 'regex:/\+7\s?[\(]{0,1}9[0-9]{2}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}/' ]
            ];

        $messages = [
            'fio.required' => 'Необходимо ввести ФИО',
            'phonenum.required'  => 'Нужно указать номер телефона',
            'phonenum.regex'  => 'Номер телефона должен быть оформлен по образцу +7 (900) 123-45-67'
        ];

        return Validator::make($request->all(), $rules, $messages);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phoneRecords = PhoneRecord::all();
        return view('phoneRecord.index')->with(['phoneRecs' => $phoneRecords]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phoneRecord.create')->with(['phoneRecs' => PhoneRecord::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('create'))
        {
            $validator = $this->createValidator($request);

            if ($validator->fails())
            {
                return view('phoneRecord.create')->withErrors($validator);
            }

            PhoneRecord::create($request->all());
        }
        return redirect()->route('phoneRecords.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PhoneRecord  $phoneRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(PhoneRecord $phoneRecord)
    {
        return view('phoneRecord.modify')->with(['phoneRecord'=> $phoneRecord]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PhoneRecord  $phoneRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhoneRecord $phoneRecord)
    {
        if ($request->has('update'))
        {
            $validator = $this->createValidator($request);

            if ($validator->fails())
            {
                return view('phoneRecord.modify')->with(['phoneRecord'=> $phoneRecord])->withErrors($validator);
            }

            $phoneRecord->update($request->all());
        }
        return redirect()->route('phoneRecords.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PhoneRecord  $phoneRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(PhoneRecord $phoneRecord)
    {
        $phoneRecord->delete();
        return redirect()->route('phoneRecords.index');
    }
}

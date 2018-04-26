<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhoneRecord as PhoneRecord;

class PhonebookController extends Controller
{
    public function index(Request $request)
	{
		$phoneRecs = PhoneRecord::all();
        $viewData = compact('phoneRecs');

		if ($request->has('modifyRecId'))
        {
            $recordId = $request->modifyRecId;
            $phoneRecord = PhoneRecord::find($recordId);

            if (isset($phoneRecord))
            {
                $viewData['modifyRecId'] = $recordId;
                $viewData['fio'] = $phoneRecord->fio;
                $viewData['phonenum'] = $phoneRecord->phonenum;
            }
        }

        return view('notebook', $viewData);
	}

	public function addRecord(Request $request)
    {
        PhoneRecord::create($request->all());
        return  redirect()->route('index');
    }

    public function modifyRecord(Request $request)
    {
        if ($request->has('recId') &&  $request->has('fio') && $request->has('phonenum') )
        {
            $phoneRecord = PhoneRecord::find($request->recId);
            $phoneRecord->fill( $request->only(['fio', 'phonenum']));
            $phoneRecord->save();
        }

        return  redirect()->route('index');
    }

    public function deleteRecord(Request $request)
    {
        $recId = $request->input('recId');

        PhoneRecord::destroy($recId);

        return  redirect()->route('index');
    }
}

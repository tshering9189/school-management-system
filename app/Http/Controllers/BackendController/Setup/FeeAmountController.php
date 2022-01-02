<?php

namespace App\Http\Controllers\BackendController\Setup;

use App\Http\Controllers\Controller;
use App\Models\FeeCategory;
use App\Models\FeeCategoryAmount;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class FeeAmountController extends Controller
{
    public function ViewFeeAmount(){
        // $data['allData'] = FeeCategoryAmount::all();
        $data['allData'] = FeeCategoryAmount::select('fee_category_id')->groupby('fee_category_id')->get();
        return view('backend.setup.fee_amount.view_fee_amount',$data);
    }

    public function AddFeeAmount(){
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.add_fee_amount',$data);
    }

    public function StoreFeeAmount(Request $request){
        $countClass = count($request->class_id);
        // dd($countClass);
        if ($countClass != NULL) {
            // dd("Store");
            for ($i=0; $i < $countClass; $i++) { 
                $fee_amount = new FeeCategoryAmount();
                $fee_amount->fee_category_id = $request->fee_category_id;
                $fee_amount->class_id = $request->class_id[$i];
                $fee_amount->amount = $request->amount[$i];
                $fee_amount->save();
            }//End for loop
        }//End IF Condition

        $notification = array(
            'message' => 'Fee Amount Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('fee.amount.view')->with($notification);
    } //End StoreFeeAmount Method

    public function EditFeeAmount($fee_category_id){
        $data['editData'] = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();
        // dd($data['editData']->toArray());
        $data['fee_categories'] = FeeCategory::all();
        $data['classes'] = StudentClass::all();
        return view('backend.setup.fee_amount.edit_fee_amount',$data);
    }

    public function UpdateFeeAmount(Request $request, $fee_category_id){
        if ($request->class_id == NULL) {
            // dd('Error');
            $notification = array(
            'message' => 'Sorry, You have not selected any class amount',
            'alert-type' => 'error'
            );

            return redirect()->route('fee.amount.view', $fee_category_id)->with($notification);

        }else{
            // dd('Perfect');
            $countClass = count($request->class_id);
            FeeCategoryAmount::where('fee_category_id', $fee_category_id)->delete(); //this will delete all the previous data
                for ($i=0; $i < $countClass; $i++) {  //this for loop will again insert data
                    $fee_amount = new FeeCategoryAmount();
                    $fee_amount->fee_category_id = $request->fee_category_id;
                    $fee_amount->class_id = $request->class_id[$i];
                    $fee_amount->amount = $request->amount[$i];
                    $fee_amount->save();
                }//End for loop
        } //End if ELSE
        $notification = array(
            'message' => 'Fee Amount Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('fee.amount.view')->with($notification);
    } //End MEthod

    public function DetailsFeeAmount($fee_category_id){
        $data['detailsData'] = FeeCategoryAmount::where('fee_category_id', $fee_category_id)->orderBy('class_id', 'asc')->get();

        return view('backend.setup.fee_amount.details_fee_amount', $data);

    }
}

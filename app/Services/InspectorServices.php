<?php

namespace App\Services;

use App\Models\GD\Inspector;
use Illuminate\Http\Request;
use Acme\AcmeCrudGenerator\Traits\ServiceHelper;
use Illuminate\Support\Facades\Validator;

class InspectorServices
{
    use ServiceHelper;

    private $inspector;

    public function __construct()
    {
        $this->inspector = new Inspector();
    }

    public function create($data)
    {
        $validator = Validator::make($data, $this->inspector->rules('create'), $this->inspector->messages());

        if ($validator->fails())
            return $this->validationFailedResponse($validator->errors());

        $this->inspector = Inspector::create($data);

        return $this->successResponse($data, __('Inspector._created_success_msg_'));
    }

    public function update($data)
    {
        $validator = Validator::make($data, $this->inspector->rules('update'), $this->inspector->messages());

        if ($validator->fails())
            return $this->validationFailedResponse($validator->errors());
        $insoector = Inspector::find($data['id']);
        $this->inspector = $insoector->update($data);
        return $this->successResponse($data, __('Inspector._created_success_msg_'));
    }

    public function delete($id)
    {
        Inspector::find($id)->delete();
        return $this->successResponse($id, __('Inspector._deleted_success_msg_'));

    }

    public function restore($id)
    {

        Inspector::onlyTrashed()->find($id)->restore();
        return $this->successResponse($id, __('Inspector._restored_success_msg_'));

    }
}

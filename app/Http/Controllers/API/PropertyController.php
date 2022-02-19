<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Property;

class PropertyController extends Controller
{
    /**
     * 物件全件取得
     */
    public function properties()
    {
        try {
            $data =Property::all();
            return $data;
        } catch (\Exception $e) {
            $result = [
                'result' => false,
                'error' => [
                    'messages' => [$e->getMessage()]
                ],
            ];
            return $this->resConversionJson($result, $e->getCode());
        }
        return $this->resConversionJson($result);
    }
    private function resConversionJson($result, $statusCode=200)
    {
        if(empty($statusCode) || $statusCode < 100 || $statusCode >= 600){
            $statusCode = 500;
        }
        return response()->json($result, $statusCode, ['Content-Type' => 'application/json'], JSON_UNESCAPED_SLASHES);
    }
    /**
     * 物件詳細取得
     */
    public function detailProperty($id)
    {
        $data =Property::find($id);
        return $data;
    }
    /**
     * 物件登録
     */
    public function insertProperty(Request $request)
    {
        $property = new Property;
        $proparties = $request->data;

        $property->size = $proparties["size"];
        $property->rent = $proparties["rent"];
        $property->age = $proparties["age"];
        $property->floor = $proparties["floor"];
        $property->save();

        $property = Property::find($property->id);
        return $property;

    }
    /**
     * 物件更新
     */
    public function updateProperty(Request $request, $id)
    {

            $property = Property::findOrFail($id);
            $proparties = $request->data;

            $property->size = $proparties["size"];
            $property->rent = $proparties["rent"];
            $property->age = $proparties["age"];
            $property->floor = $proparties["floor"];
            $property->save();
            $property = Property::find($id);

            return $property;


    }
}

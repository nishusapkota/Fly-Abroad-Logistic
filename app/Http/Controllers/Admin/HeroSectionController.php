<?php

namespace App\Http\Controllers\Admin;

use App\Models\HeroSection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateHeroSection;
use App\Http\Resources\HomeSectionResource;
use App\Http\Resources\HomeSectionCollection;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreHeroSection;

class HeroSectionController extends Controller
{
    public function store(StoreHeroSection $request)
    {
        $img_name = time() . "_" . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('heroSection'), $img_name);

        $highestOrder = HeroSection::max('order');
        // dd($highestOrder);
        $newOrder = $highestOrder + 1;

        HeroSection::create([
            'image' => 'heroSection/' . $img_name,
            'heading' => $request->heading,
            'sub_heading' => $request->sub_heading,
            'order' => $newOrder,
            // 'visibility'=> $request->visibility 

        ]);
        return response()->json([
            'status' => 200,
            'message' => 'Hero Section created successfully...'
        ]);
    }

    public function updateOrder(Request $request)
    {
        $updatedOrder = $request->updated_order;
        foreach ($updatedOrder as $id => $order) {
            $heroSection = HeroSection::find($id);

            if ($heroSection) {
                $heroSection->order = $order;
                $heroSection->save();
            }
        }
        return response()->json([
            'status' => 200,
            'message' => 'Order updated successfully...'
        ]);
    }



    public function changeStatus($id)
    {
        $heroSection = HeroSection::findOrFail($id);
        if ($heroSection->visibility == 1) {
            $heroSection->update([
                'visibility' => 0
            ]);
        } else {
            $heroSection->update([
                'visibility' => 1
            ]);
        }
    }



    public function update(UpdateHeroSection $request, $id)
    {
        $homeSection = HeroSection::find($id);
        if ($homeSection) {
            if ($request->file('image')) {
                unlink(public_path($homeSection->image));
                $img_name = time() . "_" . $request->file('image')->getClientOriginalName();
                $request->file('image')->move(public_path('heroSection'), $img_name);
            }
            $homeSection->update([
                'image' => $request->image ? 'heroSection/' . $img_name : $homeSection->image,
                'heading' => $request->heading,
                'sub_heading' => $request->sub_heading,
                'order' => $homeSection->order
                // 'visibility' => $request->visibility
            ]);
            return response()->json([
                'status' => 200,
                'message' => 'Record updated successfully..'
            ]);
        }
        return response()->json([
            'status' => 200,
            'message' => 'Record not found..'
        ]);
    }



    public function index()
    {
        $heroSection = HeroSection::all();
        return response()->json([
            'status' => 200,
            'data' => HomeSectionResource::collection($heroSection)
        ]);
    }



    public function destroy($id)
    {
        $homeSection = HeroSection::find($id);
        if ($homeSection) {
            unlink(public_path($homeSection->image));
            $homeSection->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Record deleted successfully..'
            ]);
        }
        return response()->json([
            'status' => 200,
            'message' => 'Record not found..'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\WeddingCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class WeddingCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cards = DB::table('wedding_cards')->first();
        $image = "https://vstatic.vietnam.vn/vietnam/resource/IMAGE/2025/1/18/96df3e2dca9f438eb608e499b87a549b";
        return view('welcome');
    }

    public function showWeddingCard($key)
    {
        // Tìm thiệp cưới theo key
        $weddingCard = WeddingCard::where('id', $key)->first();

        if (!$weddingCard) {
            abort(404, 'Thiep cuoi khong ton tai');
        }
        return view('template01', compact('weddingCard'));
        // Trả về view wedding.blade.php với dữ liệu từ database
        // return view('wedding.index', compact('weddingCard'));
    }

    public function showWeddingCardByName($key)
    {
        // Tìm thiệp cưới theo name
        $weddingCard = WeddingCard::where('identifyWedding', $key)->first();

        if (!$weddingCard) {
            abort(404, 'Thiep cuoi khong ton tai');
        }

        switch ($weddingCard->template) {
            case "1":
                return view('template01', compact('weddingCard'));
            case "1n":
                    return view('template01new', compact('weddingCard'));
            case "2":
                return view('template02', compact('weddingCard'));
            case "3":
                return view('template04', compact('weddingCard'));
            case "4":
                return view('template05', compact('weddingCard'));
            case "5":
                return view('template06', compact('weddingCard'));
            case "6":
                return view('template07', compact('weddingCard'));
            case "7":
                return view('template18', compact('weddingCard'));
            case "8":
                return view('template08', compact('weddingCard'));
            case "9":
                return view('template09', compact('weddingCard'));
            case "10":
                return view('template10', compact('weddingCard'));
            case "11":
                return view('template11', compact('weddingCard'));
            case "12":
                return view('template12', compact('weddingCard'));
            case "13":
                return view('template13', compact('weddingCard'));
            case "14":
                return view('template14', compact('weddingCard'));
            case "15":
                return view('template15', compact('weddingCard'));
            case "16":
                return view('template16', compact('weddingCard'));
            case "17":
                return view('template17', compact('weddingCard'));
            case "18":
                return view('template18', compact('weddingCard'));
            case "19":
                return view('template19', compact('weddingCard'));
            case "20":
                return view('template20', compact('weddingCard'));

            default:
                return view('welcome');
        }
    }

    public function showTemplate($key)
    {
        // Tìm thiệp cưới theo name
        $weddingCard  = WeddingCard::where('identifyWedding', 'test')->first();
        if (!$weddingCard) {
            return response()->json([
                'message' => 'Chua co data test. Them thiep voi id la test nhe <3'
            ]);
        }
        switch ($key) {
            case "1":
                return view('template01', compact('weddingCard'));
            case "1n":
                    return view('template01new', compact('weddingCard'));
            case "2":
                return view('template02', compact('weddingCard'));
            case "3":
                return view('template04', compact('weddingCard'));
            case "4":
                return view('template05', compact('weddingCard'));
            case "5":
                return view('template06', compact('weddingCard'));
            case "6":
                return view('template07', compact('weddingCard'));
            case "7":
                return view('template18', compact('weddingCard'));
            case "8":
                return view('template08', compact('weddingCard'));
            case "9":
                return view('template09', compact('weddingCard'));
            case "10":
                return view('template10', compact('weddingCard'));
            case "11":
                return view('template11', compact('weddingCard'));
            case "12":
                 return view('template16', compact('weddingCard'));
            // case "13":
            //     return view('template13', compact('weddingCard'));
            // case "14":
            //     return view('template14', compact('weddingCard'));
           case "15":
                return view('template15', compact('weddingCard'));
            case "16":
               return view('template16', compact('weddingCard'));
            // case "17":
            //     return view('template17', compact('weddingCard'));
            // case "18":
            //     return view('template18', compact('weddingCard'));
            // case "19":
            //     return view('template19', compact('weddingCard'));
            // case "20":
            //     return view('template20', compact('weddingCard'));

            default:
                return view('welcome');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('weddingform');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $weddingCardCheck = WeddingCard::where('identifyWedding', $request->identifyWedding)->first();

        if ($weddingCardCheck) {
            // abort(404, 'Tên Thiệp cưới đã tồn tại. Thử tên khác nhé');
            return response()->json([
                'message' => 'Ten thiep cuoi da ton tai. Thu ten khac nhe'
            ]);
        }
        $validated = $request->validate([
            'identifyWedding' => 'required|string|max:255',
            'template' => 'required|string|max:255',
            'wedding_time' => 'required|string|max:255',
            'banner_preview' => 'required|string|max:1000',
            'bride_name' => 'required|string|max:255',
            'groom_name' => 'required|string|max:255',
            'banner_top' => 'required|string|max:1000',
            'wedding_date' => 'required|date',
            'wedding_message' => 'required|string|max:1000',
            'address_wedding' => 'required|string|max:1000',
            'name_place_wedding' => 'required|string|max:1000',
            'address_wedding_map' => 'required|string|max:1000',
            'bride_birthday' => 'required|date',
            'groom_birthday' => 'required|date',
            'bride_avatar' => 'required|string|max:5000',
            'groom_avatar' => 'required|string|max:5000',
            'des_bride' => 'required|string|max:5000',
            'des_groom' => 'required|string|max:5000',
            'banner_love_story' => 'required|string|max:5000',
            'love_story' => 'required|string|max:5000',
            'banner_coundown' => 'required|string|max:5000',
            'album' => 'required|string|max:50000',
            'date_coundown' => 'required|string|max:500',
            'address_groom' => 'required|string|max:500',
            'address_bride' => 'required|string|max:500',
            'groom_eating_title' => 'required|string|max:500',
            'bride_eating_title' => 'required|string|max:500',
            'groom_eating_date' => 'required|date',
            'bride_eating_date' => 'required|date',
            'time_groom' => 'required|string|max:500',
            'time_groom_al' => 'required|string|max:500',
            'time_bride' => 'required|string|max:500',
            'time_bride_al' => 'required|string|max:500',
            'bride_phone' => 'required|string|max:15',
            'groom_phone' => 'required|string|max:15',
            'message_invite' => 'required|string|max:1000',
            'message_gift' => 'required|string|max:1000',
            'banner_thanks' => 'required|string|max:1000',
            'message_thanks' => 'required|string|max:1000',
            'groom_qr' => 'required|string|max:500',
            'bride_qr' => 'required|string|max:500',
            'groom_map' => 'required|string|max:500',
            'bride_map' => 'required|string|max:500',
        ]);


        // 2️⃣ Tạo thiệp cưới trước để lấy ID
        $weddingCard = WeddingCard::create($validated);
        $weddingId = $weddingCard->id; // Lấy ID của thiệp vừa tạo

        $updateData = [];

        $imageFields = [
            'banner_top_image' => 'banner_top',
            'banner_preview_image' => 'banner_preview',
            'banner_coundown_image' => 'banner_coundown',
            'banner_story_image' => 'banner_love_story',
            'banner_thanks_image' => 'banner_thanks',
            'avatar_groom' => 'groom_avatar',
            'avatar_bride' => 'bride_avatar',
            'groom_qr_image' => 'groom_qr',
            'bride_qr_image' => 'bride_qr',
        ];

        foreach ($imageFields as $inputName => $columnName) {
            if ($request->hasFile($inputName)) {
                $path = $request->file($inputName)->storePublicly("weddings/$weddingId", 's3');
                $updateData[$columnName] = Storage::disk('s3')->url($path);
            }
        }

        // Album (nhiều ảnh)
        if ($request->hasFile('image')) {
            $imagePaths = [];
            foreach ($request->file('image') as $image) {
                $path = $image->storePublicly("weddings/$weddingId", 's3');
                $imagePaths[] = Storage::disk('s3')->url($path);
            }
            $updateData['album'] = json_encode($imagePaths);
        }

        $weddingCard->update($updateData);


        // Trả về view với thông báo thành công
        return redirect()->route('wedding.create')->with('success', 'Luu thiep thanh cong');
    }

    /**
     * Display the specified resource.
     */
    public function show($key)
    {
        // Tìm thiệp cưới theo key
        $weddingCard = DB::table('wedding_cards')->where('id', $key)->first();

        if (!$weddingCard) {
            abort(404, 'Thiep cuoi khong ton tai');
        }
        return view('template01', compact('weddingCard'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($key)
    {
        $weddingCard = WeddingCard::findOrFail($key);
        if (!$weddingCard) {
            abort(404, 'Thiep cuoi khong ton tai');
        }
        return view('weddingform', compact('weddingCard'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editByName($key)
    {
        $weddingCard = DB::table('wedding_cards')->where('identifyWedding', $key)->first();
        if (!$weddingCard) {
            abort(404, 'Thiep cuoi khong ton tai');
        }
        return view('weddingform', compact('weddingCard'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $key)
    {
        $data = $request->validate([
            'identifyWedding' => 'required|string|max:255',
            'template' => 'required|string|max:255',
            'banner_preview' => 'required|string|max:1000',
            'bride_name' => 'required|string|max:255',
            'groom_name' => 'required|string|max:255',
            'banner_top' => 'required|string|max:255',
            'wedding_time' => 'required|string|max:255',
            'wedding_date' => 'required|date',
            'wedding_message' => 'required|string|max:1000',
            'address_wedding' => 'required|string|max:1000',
            'name_place_wedding' => 'required|string|max:1000',
            'address_wedding_map' => 'required|string|max:1000',
            'bride_birthday' => 'required|date',
            'groom_birthday' => 'required|date',
            'bride_avatar' => 'required|string|max:5000',
            'groom_avatar' => 'required|string|max:5000',
            'des_bride' => 'required|string|max:5000',
            'des_groom' => 'required|string|max:5000',
            'banner_love_story' => 'required|string|max:5000',
            'love_story' => 'required|string|max:5000',
            'banner_coundown' => 'required|string|max:5000',
            'album' => 'required|string|max:50000',
            'date_coundown' => 'required|string|max:500',
            'address_groom' => 'required|string|max:500',
            'address_bride' => 'required|string|max:500',
            'groom_eating_title' => 'required|string|max:500',
            'bride_eating_title' => 'required|string|max:500',
            'groom_eating_date' => 'required|date',
            'bride_eating_date' => 'required|date',
            'time_groom' => 'required|string|max:500',
            'time_groom_al' => 'required|string|max:500',
            'time_bride' => 'required|string|max:500',
            'time_bride_al' => 'required|string|max:500',
            'bride_phone' => 'required|string|max:15',
            'groom_phone' => 'required|string|max:15',
            'message_invite' => 'required|string|max:1000',
            'message_gift' => 'required|string|max:1000',
            'banner_thanks' => 'required|string|max:1000',
            'message_thanks' => 'required|string|max:1000',
            'groom_qr' => 'required|string|max:500',
            'bride_qr' => 'required|string|max:500',
            'groom_map' => 'required|string|max:500',
            'bride_map' => 'required|string|max:500',
        ]);

        $weddingCard = WeddingCard::findOrFail($key);
        $weddingId = $weddingCard->id;
        $weddingCard->update($data);

        $updateData = [];

        $imageFields = [
            'banner_top_image' => 'banner_top',
            'banner_preview_image' => 'banner_preview',
            'banner_coundown_image' => 'banner_coundown',
            'banner_story_image' => 'banner_love_story',
            'banner_thanks_image' => 'banner_thanks',
            'avatar_groom' => 'groom_avatar',
            'avatar_bride' => 'bride_avatar',
            'groom_qr_image' => 'groom_qr',
            'bride_qr_image' => 'bride_qr',
        ];

        foreach ($imageFields as $inputName => $columnName) {
            if ($request->hasFile($inputName)) {
                $path = $request->file($inputName)->storePublicly("weddings/$weddingId", 's3');
                $updateData[$columnName] = Storage::disk('s3')->url($path);
            }
        }

        // Album (nhiều ảnh)
        if ($request->hasFile('image')) {
            $imagePaths = [];
            foreach ($request->file('image') as $image) {
                $path = $image->storePublicly("weddings/$weddingId", 's3');
                $imagePaths[] = Storage::disk('s3')->url($path);
            }
            $updateData['album'] = json_encode($imagePaths);
        }

        $weddingCard->update($updateData);

        // return redirect()->route('wedding.edit', $key)->with('success', 'Cập nhật thiệp cưới thành công!');
        return response()->json([
            'message' => 'Cap nhat thiep cuoi thanh cong!'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function creates()
    {
        return view('imageupload');
    }

    // Xử lý cập nhật ảnh
    public function updateImage(Request $request)
    {
        // // Kiểm tra file có tồn tại
        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048' // Giới hạn 2MB
        // ]);

        // // Lưu ảnh vào thư mục storage/app/public/images
        // $path = $request->file('image')->store('images', 'public');

        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePaths = [];

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $path = $image->store('uploads', 'public'); // Lưu vào thư mục storage/app/public/uploads
                $imagePaths[] = $path;
            }
        }

        return response()->json([
            'message' => 'Upload thành công!',
            'paths' => $imagePaths
        ]);

        // return back()->with('success', 'Ảnh đã được tải lên thành công!')->with('image', $path);
        return $path;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WeddingCard $weddingCard)
    {
        //
    }
}

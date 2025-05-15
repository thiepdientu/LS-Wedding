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
            // case "15":
            //     return view('template15', compact('weddingCard'));
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

        $realPathBannerTop = "";
        $realPathBannerPreview = "";
        $realPathAvatarGroom = "";
        $realPathAvatarBride = "";
        $realPathGroomQr = "";
        $realPathBrideQr = "";
        $realPathBannerCoundown = "";
        $realPathBannerThanks = "";
        $realPathBannerStory = "";
        if ($request->hasFile('banner_top_image')) {
            $path = $request->file('banner_top_image')->store("weddings/$weddingId", 'public');
            $realPathBannerTop = Storage::url($path);
        }

        if ($request->hasFile('banner_preview_image')) {
            $path = $request->file('banner_preview_image')->store("weddings/$weddingId", 'public');
            $realPathBannerPreview = Storage::url($path);
        }

        if ($request->hasFile('banner_coundown_image')) {
            $path = $request->file('banner_coundown_image')->store("weddings/$weddingId", 'public');
            $realPathBannerCoundown = Storage::url($path);
        }

        if ($request->hasFile('banner_story_image')) {
            $path = $request->file('banner_story_image')->store("weddings/$weddingId", 'public');
            $realPathBannerStory = Storage::url($path);
        }


        if ($request->hasFile('banner_thanks_image')) {
            $path = $request->file('banner_thanks_image')->store("weddings/$weddingId", 'public');
            $realPathBannerThanks = Storage::url($path);
        }


        if ($request->hasFile('avatar_groom')) {
            $path = $request->file('avatar_groom')->store("weddings/$weddingId", 'public');
            $realPathAvatarGroom = Storage::url($path);
        }

        if ($request->hasFile('avatar_bride')) {
            $path = $request->file('avatar_bride')->store("weddings/$weddingId", 'public');
            $realPathAvatarBride = Storage::url($path);
        }

        if ($request->hasFile('groom_qr_image')) {
            $path = $request->file('groom_qr_image')->store("weddings/$weddingId", 'public');
            $realPathGroomQr = Storage::url($path);
        }

        if ($request->hasFile('bride_qr_image')) {
            $path = $request->file('bride_qr_image')->store("weddings/$weddingId", 'public');
            $realPathBrideQr = Storage::url($path);
        }


        // 3️⃣ Lưu ảnh vào thư mục public/{id}
        $imagePaths = [];

        if ($request->hasFile('image')) {

            foreach ($request->file('image') as $image) {

                $path = $image->store("weddings/$weddingId", 'public');
                $imagePaths[] = Storage::url($path);
            }
        }

        // 4️⃣ Cập nhật đường dẫn ảnh vào database
        $weddingCard->update(['album' => json_encode($imagePaths)]);

        // 4️⃣ Cập nhật image
        $weddingCard->update(['banner_top' => $realPathBannerTop]);
        $weddingCard->update(['banner_preview' => $realPathBannerPreview]);
        $weddingCard->update(['groom_avatar' => $realPathAvatarGroom]);
        $weddingCard->update(['bride_avatar' => $realPathAvatarBride]);
        $weddingCard->update(['banner_coundown' => $realPathBannerCoundown]);
        $weddingCard->update(['banner_love_story' => $realPathBannerStory]);
        $weddingCard->update(['banner_thanks' => $realPathBannerThanks]);
        $weddingCard->update(['groom_qr' => $realPathGroomQr]);
        $weddingCard->update(['bride_qr' => $realPathBrideQr]);


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

        if ($request->hasFile('banner_top_image')) {
            $path = $request->file('banner_top_image')->store("weddings/$weddingId", 'public');
            $weddingCard->update(['banner_top' => Storage::url($path)]);
        }


        if ($request->hasFile('banner_preview_image')) {
            $path = $request->file('banner_preview_image')->store("weddings/$weddingId", 'public');
            $weddingCard->update(['banner_preview' => Storage::url($path)]);
        }

        if ($request->hasFile('banner_coundown_image')) {
            $path = $request->file('banner_coundown_image')->store("weddings/$weddingId", 'public');
            $weddingCard->update(['banner_coundown' => Storage::url($path)]);
        }

        if ($request->hasFile('banner_story_image')) {
            $path = $request->file('banner_story_image')->store("weddings/$weddingId", 'public');
            $weddingCard->update(['banner_love_story' => Storage::url($path)]);
        }

        if ($request->hasFile('banner_thanks_image')) {
            $path = $request->file('banner_thanks_image')->store("weddings/$weddingId", 'public');
            $weddingCard->update(['banner_thanks' => Storage::url($path)]);
        }

        if ($request->hasFile('avatar_groom')) {
            $path = $request->file('avatar_groom')->store("weddings/$weddingId", 'public');
            $weddingCard->update(['groom_avatar' => Storage::url($path)]);
        }

        if ($request->hasFile('avatar_bride')) {
            $path = $request->file('avatar_bride')->store("weddings/$weddingId", 'public');
            $weddingCard->update(['bride_avatar' => Storage::url($path)]);
        }

        if ($request->hasFile('groom_qr_image')) {
            $path = $request->file('groom_qr_image')->store("weddings/$weddingId", 'public');
            $weddingCard->update(['groom_qr' => Storage::url($path)]);
        }

        if ($request->hasFile('bride_qr_image')) {
            $path = $request->file('bride_qr_image')->store("weddings/$weddingId", 'public');
            $weddingCard->update(['bride_qr' => Storage::url($path)]);
        }

        // 3️⃣ Lưu ảnh vào thư mục public/{id}
        $imagePaths = [];

        if ($request->hasFile('image')) {

            foreach ($request->file('image') as $image) {

                $path = $image->store("weddings/$weddingId", 'public');
                $imagePaths[] = Storage::url($path);
            }
            // 4️⃣ Cập nhật đường dẫn ảnh vào database
            $weddingCard->update(['album' => json_encode($imagePaths)]);
        }


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

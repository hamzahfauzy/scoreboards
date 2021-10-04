<?php
$conn    = get_connection();
$db      = new src\Database($conn);
if(request()->isMethod('POST'))
{
    $request = request()->post();

    $participant    = $db->insert('participants',[
        'name'      => $request->name,
        'gender'    => $request->gender,
        'status'    => 'Menunggu',
        'category_id'     => $request->category_id,
        'order_number'    => $request->order_number,
    ]);

    if($participant)
        return redirect()->route('admin/peserta')->withMessage('success','Data Berhasil Disimpan!');
    return redirect()->route('admin/peserta')->withMessage('fail','Data Gagal Disimpan!');
}

$categories = $db->all('categories');
$participant_names = $db->all('participant_names');

return view('admin/peserta/create',[
    'categories' => $categories,
    'participant_names' => $participant_names,
]);
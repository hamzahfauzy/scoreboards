<?php
$conn    = get_connection();
$db      = new src\Database($conn);
$participant    = $db->single('participants',[
    'id' => $_GET['id']
]);
if(request()->isMethod('POST'))
{
    $request = request()->post();
    $participant    = $db->update('participants',[
        'name'      => $request->name,
        'gender'    => $request->gender,
        'category_id'    => $request->category_id,
        'order_number'    => $request->order_number,
    ],[
        'id' => $_GET['id']
    ]);

    if($participant)
        return redirect()->route('admin/peserta')->withMessage('success','Data Berhasil Diupdate!');
    return redirect()->route('admin/peserta')->withMessage('fail','Data Gagal Diupdate!');
}

$categories = $db->all('categories');
$participant_names = $db->all('participant_names');
return view('admin/peserta/edit',[
    'categories' => $categories,
    'participant_names' => $participant_names,
    'participant' => $participant,
]);
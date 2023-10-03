<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Company;
use App\Models\Phone;

class PhoneBook extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $persons = Person::all();
        return view("back.phonebook.index", compact("persons"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("back.phonebook.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $person = new Person();

        $person->name = $request->name;
        $person->surname = $request->surname;
        $person->father_name = $request->father_name;
        $person->fax = $request->fax;
        $person->email = $request->email;

        $person->company_id = $request->company_id;

        $person->save();

        $phone = new Phone();

        $phone->phone = $request->phone_number;

        $person->phones()->save($phone);

        return redirect()
            ->route("phonebook.index")
            ->with("success", "Məlumat uğurla əlavə edildi.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $person = Person::find($id);
        $phoneNumbers = $person->phones;
        return view("back.phonebook.update", compact("person", "phoneNumbers"));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id)
    {
        $person = Person::find($id);

        if (!$person) {
            return redirect()
                ->route("phonebook.index")
                ->with("error", "Tapılmadı.");
        }

        $person->name = $request->name;
        $person->surname = $request->surname;
        $person->father_name = $request->father_name;
        $person->fax = $request->fax;
        $person->email = $request->email;
        $person->company_id = $request->company_id;

        $person->save();

        $newPhoneNumbers = $request->input("phone_numbers", []);
        $person->phones()->delete();

        foreach ($newPhoneNumbers as $phoneNumber) {
            $phone = new Phone();
            $phone->phone = $phoneNumber;
            $person->phones()->save($phone);
        }

        return redirect()
            ->route("phonebook.index")
            ->with("success", "Məlumat uğurla güncəlləndi.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        Person::find($id)->delete();
        return redirect()
            ->route("phonebook.index")
            ->with(
                "success",
                "Məlumat uğurla silinmiş Contact Listlər siyahısına əlavə edildi.."
            );
    }

    public function trashed()
    {
        $persons = Person::onlyTrashed()
            ->orderBy("deleted_at", "desc")
            ->get();
        return view("back.phonebook.trashed", compact("persons"));
    }

    public function recover(string $id)
    {
        Person::onlyTrashed()
            ->find($id)
            ->restore();
        return redirect()
            ->route("phonebook.index")
            ->with("success", "Məlumat uğurla geri əlavə edildi");
    }

    public function hardDelete(string $id)
    {
        Person::onlyTrashed()
            ->find($id)
            ->forceDelete();
        return redirect()
            ->route("phonebook.index")
            ->with("success", "Məlumat uğurla silindi..");
    }

    public function destroy(string $id)
    {
        $person = Person::find($id);
        $person->delete();
        return redirect()
            ->route("phonebook.index")
            ->with("success", "Məlumat uğurla silindi..");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Spatie\JsonApiPaginate\JsonApiPaginateServiceProvider;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;

class ContactController extends BaseController
{

		public function index(Request $request) {
			return response()->json(["contacts" => Contact::paginate()]);
		}
			
		public function show($id) {
			$contact = Contact::find($id);

			return response()->json([
				"findContact" => $contact
			]);
		}

    public function create(Request $request) {

			$contact = new Contact();
			
			$request->file('image')->store('images', 'public');
			
			try {
						$contact = $request->all();

					 	Contact::create($contact);
						
						return response()->json(["msg"=>"contact created"], 201);

        } catch (\Exception $error) {
						return ['return' => "error"];
        }
    }

		public function update(Request $request, $id) {
			$contact = Contact::find($id);
			
			$images = $request->file('image')->store('images', 'public');
			
			$contact->image = $images;
			$contact->name = $request->name;
			$contact->surname = $request->surname;
			$contact->phone = $request->phone;
			$contact->email = $request->email;
			$contact->cep = $request->cep;
			$contact->state = $request->state;
			$contact->city = $request->city;
			$contact->street = $request->street;
			$contact->neighborhood = $request->neighborhood;
			$contact->number = $request->number;
		
			$contact->save();
		}

		public function delete($id) {
			$contact = Contact::find($id);

			$contact -> delete();
			
			return response()->json(["msg"=>"contact deleted"], 200);
		}

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

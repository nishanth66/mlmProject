<?php

namespace App\Http\Controllers;

use App\DataTables\pinDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatepinRequest;
use App\Http\Requests\UpdatepinRequest;
use App\Repositories\pinRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class pinController extends AppBaseController
{
    /** @var  pinRepository */
    private $pinRepository;

    public function __construct(pinRepository $pinRepo)
    {
        $this->pinRepository = $pinRepo;
    }

    /**
     * Display a listing of the pin.
     *
     * @param pinDataTable $pinDataTable
     * @return Response
     */
    public function index(pinDataTable $pinDataTable)
    {
        return $pinDataTable->render('pins.index');
    }

    /**
     * Show the form for creating a new pin.
     *
     * @return Response
     */
    public function create()
    {
        return view('pins.create');
    }

    /**
     * Store a newly created pin in storage.
     *
     * @param CreatepinRequest $request
     *
     * @return Response
     */
    public function store(CreatepinRequest $request)
    {
        $pin = $this->generateRandomString();
        $input = [
            'pin' => $pin,
        ];
        $pin = $this->pinRepository->create($input);
        Flash::success('Pin saved successfully.');
        return redirect(route('pins.index'));
    }

    public function generateRandomString() {
        $integer = '01234567890123456789';
        $integerlen = strlen($integer);
        $randomString = '';
        for ($i = 0; $i < 3; $i++) {
            $randomString .= $integer[rand(0, $integerlen - 1)];
        }
        $char = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charlen = strlen($char);
        for ($i = 0; $i < 3; $i++) {
            $randomString .= $char[rand(0, $charlen - 1)];
        }
        $sym = '!@~$%&*+!@~$%&*+';
        $symlen = strlen($sym);
        for ($i = 0; $i < 2; $i++) {
            $randomString .= $sym[rand(0, $symlen - 1)];
        }
        return str_shuffle($randomString);
    }

    /**
     * Display the specified pin.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pin = $this->pinRepository->find($id);

        if (empty($pin)) {
            Flash::error('Pin not found');

            return redirect(route('pins.index'));
        }

        return view('pins.show')->with('pin', $pin);
    }

    /**
     * Show the form for editing the specified pin.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pin = $this->pinRepository->find($id);

        if (empty($pin)) {
            Flash::error('Pin not found');

            return redirect(route('pins.index'));
        }

        return view('pins.edit')->with('pin', $pin);
    }

    /**
     * Update the specified pin in storage.
     *
     * @param  int              $id
     * @param UpdatepinRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatepinRequest $request)
    {
        $pin = $this->pinRepository->find($id);

        if (empty($pin)) {
            Flash::error('Pin not found');

            return redirect(route('pins.index'));
        }

        $pin = $this->pinRepository->update($request->all(), $id);

        Flash::success('Pin updated successfully.');

        return redirect(route('pins.index'));
    }

    /**
     * Remove the specified pin from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pin = $this->pinRepository->find($id);

        if (empty($pin)) {
            Flash::error('Pin not found');

            return redirect(route('pins.index'));
        }

        $this->pinRepository->delete($id);

        Flash::success('Pin deleted successfully.');

        return redirect(route('pins.index'));
    }
}

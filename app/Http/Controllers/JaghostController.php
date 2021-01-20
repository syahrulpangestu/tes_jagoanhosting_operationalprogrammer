<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jaghost;

class JaghostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(Request $request, Jaghost $jaghost){
        $select = explode(',', $request->select);
        $statusNotIn = explode(',', $request->statusNotIn);
        $statusIn = explode(',', $request->statusIn);
        $idNotBetween = explode(',', $request->idNotBetween);
        $idBetween = explode(',', $request->idBetween);
        $statusOrNotIn = explode(',', $request->statusOrNotIn);
        $statusOrIn = explode(',', $request->statusOrIn);

        $data = DB::table('jaghosts')->Paginate(5);        
       if (count($request->toArray()) > 0) {

        $conditions = [];

        $orderby = [];

        if ($request->has('limit')) {
            $limit = $request->limit;
        } else {
            $limit = 10;
        }

        if ($request->has('firstname') || $request->has('lastname')) {
            if ($request->firstname) {
                $jaghost = Jaghost::firstname($request->firstname);
            }
            if ($request->lastname) {
                $jaghost = Jaghost::lastname($request->lastname);
            }

            $condition = [
                'type' => 'whereColumn',
                'data' => [
                    ['firstname' => $request->firstname],
                    ['lastname' => $request->lastname]
                ],
            ];
            array_push($conditions, $condition);
        }

        if ($request->gender == 'true') {
            $jaghost = Jaghost::gender($request->gender);

            $condition = [
                'type' => 'whereNull',
                'data' => ['gender'],
            ];
            array_push($conditions, $condition);
        }

        if ($request->has('statusNotIn')) {
            $jaghost = Jaghost::statusWhereNotIn($statusNotIn);

            $condition = [
                'type' => 'whereNotIn',
                'data' => ['status' => $request->statusNotIn],
            ];
            array_push($conditions, $condition);
        }

        if ($request->has('statusIn')) {
            $jaghost = Jaghost::statusWhereIn($statusIn);

            $condition = [
                'type' => 'whereIn',
                'data' => ['status' => $request->statusIn]
            ];
            array_push($conditions, $condition);
        }

        if ($request->has('idNotBetween')) {
            $jaghost = Jaghost::idNotBetween($idNotBetween);

            $condition = [
                [
                    'type' => 'whereNotBetween',
                    'data' => ['id' => $request->idNotBetween]
                ],
            ];
            array_push($conditions, $condition);
        }

        if ($request->has('idBetween')) {
            $jaghost = Jaghost::idBetween($idBetween);

            $condition = [
                [
                    'type' => 'whereBetween',
                    'data' => ['id' => $request->idBetween]
                ],
            ];
            array_push($conditions, $condition);
        }

        if ($request->has('idOrWhere')) {
            if ($request->sign == '>') {
                $jaghost = Jaghost::idOrWhere($request->idOrWhere, '>');
            } else {
                $jaghost = Jaghost::idOrWhere($request->idOrWhere, '<');
            }

            $condition = [
                'type' => 'orWhere',
                'data' => ['id', $request->sign ? $request->sign : '>', $request->idOrWhere]
            ];
            array_push($conditions, $condition);
        }

        if ($request->has('statusOrNotIn') || $request->has('statusOrIn')) {
            $jaghost = Jaghost::statusOrNotIn($statusOrNotIn);
            $jaghost = Jaghost::statusOrIn($statusOrIn);

            $condition = [
                'type' => 'orWhere',
                'function' =>
                [
                    'type' => 'whereNotIn',
                    'data' => ['status', [$request->statusOrNotIn]]
                ],
                [
                    'type' => 'whereIn',
                    'data' => ['status', [$request->statusOrIn]]
                ]
            ];
            array_push($conditions, $condition);
        }

        if ($request->has('field')) {
            if ($request->has('order')) {
                $jaghost = Jaghost::dataOrderBy($request->field, $request->order);
            } else {
                $jaghost = Jaghost::dataOrderBy($request->field);
            }

            $dataOrder = [
                'field' => $request->field,
                'order' => $request->order ? $request->order : 'asc'
            ];
            array_push($orderby, $dataOrder);
        }
        
        if(strlen($request->select) > 0){
            $data = $jaghost->paginate($limit, $select)->getCollection();
            $data = $jaghost->paginate($limit, $select);
        } else {
            $data = $jaghost->paginate($limit)->getCollection();
            $data = $jaghost->paginate($limit);
        }

        if ($request->has('page')) {
            $page = $request->page;
        } else {
            $page = $data->currentPage();
        }

        return response()->json([
            'limit' => $limit,
            'current_page' => $page,
            'total_row' => $data->count(),
            'total_page' => $data->lastPage(),
            'select' => $request->select,
            'order' => $orderby,
            'data' => $data,
            'conditions' => $conditions,
        ]);
    } else {        
            return response()->json([
                'limit' => 10,
                'current_page' => $data->currentPage(),
                'total_row' => $data->count(),
                'total_page' => $data->lastPage(),
                'data' => $data,
            ]);
        }
    }
}

<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProposalRequest;
use App\Models\Category;
use App\Models\Proposal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProposalController extends Controller
{
    public function index(Request $request)
    {
        if(Auth::user()->isSuperAdmin())
            return view('admin.pages.proposal.index',[
                'proposals' => Proposal::filter($request->all())->paginate(10),
                
            ]);
        else 
            abort(404);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upsert(Proposal $proposal)
    {
        if(Auth::user()->isSuperAdmin())
            return view('admin.pages.proposal.upsert',[
                'proposal' => $proposal,
            ]);
        else 
            abort(404);
    }




    public function modify(ProposalRequest $request)
    {
        return Proposal::upsertInstance($request);
    }

    public function destroy(Proposal $proposal)
    {
        return $proposal->deleteInstance();
    }

    public function filter(Request $request)
    {
        return view('admin.pages.proposal.index',[
            'proposals' => Proposal::filter($request->all())->paginate(10)
        ]);
    }
}

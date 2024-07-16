<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectLocation;
use App\Models\ProjectPageBanner;
use App\Models\Projectype;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index(Request $request, $category = null)
    {
        //  dd($request->all());
        $banner = ProjectPageBanner::first();
        $projectCategories = ProjectCategory::all();
        $projectType = Projectype::all();
        $projectLocation = ProjectLocation::all();

        $query = Project::query();

        //  Filter based on category slug
        if ($request->category) {
            $findCategory = ProjectCategory::where('slug', $request->category)->firstOrFail();
            $query->where('project_category_id', $findCategory->id);
        } else {
            // Check if category is provided and filter based on project_category_slug
            if ($category) {
                $findCategory = ProjectCategory::where('slug', $category)->firstOrFail();
                $query->where('project_category_id', $findCategory->id);
            }
        }

        // Filter based on type_id
        if ($request->type) {
            $query->where('type_id', $request->type);
        }

        // Filter based on location_id
        if ($request->location) {
            $query->where('location_id', $request->location);
        }

        $projects = $query->get();
        $filters = $request->all();
        return view('frontend.project.index', compact('projects', 'banner', 'projectCategories', 'projectType', 'projectLocation', 'filters'));
    }


    public function projectDetails($slug)
    {
        $data = Project::where('slug', $slug)->firstOrFail();
        // Retrieve all related projects except the current project
        $relatedProjects = Project::where('id', '!=', $data->id)
            ->get();
        if ($data) {
            return view('frontend.project.project_details', compact('data', 'relatedProjects'));
        }
    }
}

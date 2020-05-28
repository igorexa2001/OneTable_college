<?php

namespace App\Http\Controllers;

use App\Factories\FeedbackFactory;
use App\Mail\Feedback;
use App\Repositories\CategoryRepository;
use App\Repositories\FeedbackDataRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    /**
     * @var CategoryRepository
     * @var FeedbackDataRepository
     */
    private $categoryRepository;
    private $feedbackDataRepository;

    /**
     * @var FeedbackFactory
     */
    private $feedbackFactory;

    /**
     * ContactController constructor.
     * @param CategoryRepository $categoryRepository
     * @param FeedbackDataRepository $feedbackDataRepository
     * @param FeedbackFactory $feedbackFactory
     */
    public function __construct (
        CategoryRepository $categoryRepository,
        FeedbackDataRepository $feedbackDataRepository,
        FeedbackFactory $feedbackFactory
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->feedbackDataRepository = $feedbackDataRepository;
        $this->feedbackFactory = $feedbackFactory;
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        return view('contact.index',[
            'categories' => $this->categoryRepository->categoriesMenu(),
        ]);
    }

    /**
     * Подпись и отправка формы обратной связи
     *
     * @param Request $request
     * @return Factory|RedirectResponse|View
     */
    public function store(Request $request)
    {
        $feedbackData = $this->feedbackFactory->create();
        if(!$feedbackData->validate($request->all())) {
            return redirect()->back();
        }

        $feedbackData->fill($request->all());
        $feedbackData->save();

        //Mail::to('user@example.com')->send(new Feedback($feedbackData));

        return view('contact.complete',[
            'categories' => $this->categoryRepository->categoriesMenu(),
        ]);
    }
}

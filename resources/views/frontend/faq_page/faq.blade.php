@extends('frontend.layouts.app')

@section('title', 'FAQ Page')

@section('content')

    @include('frontend.welcome_page.header')

    <section class="faq-section">

        <div class="container">

            <div class="faq-header">

                <span class="faq-badge">
                    Help Center
                </span>

                <h2>
                    Frequently Asked Questions
                </h2>

                <p>
                    Learn how StackPilot helps Laravel developers monitor,
                    troubleshoot and manage their projects efficiently.
                </p>

            </div>

            <div class="faq-wrapper">

                {{-- FAQ 1 --}}
                <div class="faq-card">

                    <div class="faq-question">

                        <h4>
                            What is StackPilot?
                        </h4>

                        <button class="faq-toggle">
                            <i class="fas fa-chevron-down"></i>
                        </button>

                    </div>

                    <div class="faq-answer">

                        <p>
                            StackPilot is a Laravel Development Toolkit designed
                            to monitor applications, verify deployments,
                            inspect logs, manage queues, analyze system health,
                            and simplify project maintenance from a single dashboard.
                        </p>

                    </div>

                </div>

                {{-- FAQ 2 --}}
                <div class="faq-card">

                    <div class="faq-question">

                        <h4>
                            Why was StackPilot created?
                        </h4>

                        <button class="faq-toggle">
                            <i class="fas fa-chevron-down"></i>
                        </button>

                    </div>

                    <div class="faq-answer">

                        <p>
                            StackPilot was built to help developers quickly
                            identify Git issues, Laravel optimization problems,
                            Node.js environment errors, failed queues,
                            cron issues and application logs without manually
                            checking multiple tools.
                        </p>

                    </div>

                </div>

                {{-- FAQ 3 --}}
                <div class="faq-card">

                    <div class="faq-question">

                        <h4>
                            What modules are included?
                        </h4>

                        <button class="faq-toggle">
                            <i class="fas fa-chevron-down"></i>
                        </button>

                    </div>

                    <div class="faq-answer">

                        <p>
                            StackPilot includes Project Management,
                            Deployment Center, Git Repository Manager,
                            Terminal Executor, File Manager,
                            Database Tools, Queue Monitoring,
                            Backup Center and Notification System.
                        </p>

                    </div>

                </div>

                {{-- FAQ 4 --}}
                <div class="faq-card">

                    <div class="faq-question">

                        <h4>
                            Can StackPilot monitor Laravel performance?
                        </h4>

                        <button class="faq-toggle">
                            <i class="fas fa-chevron-down"></i>
                        </button>

                    </div>

                    <div class="faq-answer">

                        <p>
                            Yes. StackPilot can help identify optimization
                            opportunities by reviewing logs, queue activity,
                            scheduled jobs, deployment history and system status.
                        </p>

                    </div>

                </div>

                {{-- FAQ 5 --}}
                <div class="faq-card">

                    <div class="faq-question">

                        <h4>
                            Is StackPilot suitable for production projects?
                        </h4>

                        <button class="faq-toggle">
                            <i class="fas fa-chevron-down"></i>
                        </button>

                    </div>

                    <div class="faq-answer">

                        <p>
                            Absolutely. StackPilot is designed to support
                            real-world Laravel projects by providing centralized
                            diagnostics, monitoring and deployment management.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>

    @include('frontend.welcome_page.footer')

@endsection

@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const faqCards = document.querySelectorAll('.faq-card');

            faqCards.forEach(card => {

                const btn = card.querySelector('.faq-toggle');

                btn.addEventListener('click', () => {

                    card.classList.toggle('active');

                });

            });

        });
    </script>
@endpush

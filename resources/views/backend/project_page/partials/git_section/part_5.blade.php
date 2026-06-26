<div class="card-header">

    <h3 class="card-title">

        <i class="fas fa-history text-primary"></i>

        Latest Commits

    </h3>

</div>

<div class="card-body">

    @forelse($commits as $commit)
        <div class="info-box mb-3">

            <span class="info-box-icon bg-success">

                <i class="fas fa-check"></i>

            </span>

            <div class="info-box-content">

                <span class="info-box-text">

                    <strong>{{ $commit['message'] }}</strong>

                </span>

                <span class="info-box-number">

                    <code>{{ $commit['hash'] }}</code>

                    • {{ $commit['author'] }}

                    • {{ $commit['date'] }}

                </span>

            </div>

        </div>

    @empty

        <div class="alert alert-secondary">

            <i class="fab fa-git-alt"></i>

            No commits found.

        </div>
    @endforelse

</div>

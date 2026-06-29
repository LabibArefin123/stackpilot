<div class="row">
    <!-- Repository Health -->
    <div class="col-md-3">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>
                    {{ $git['health'] ?? 0 }}%
                </h3>
                <p>
                    Repository Health
                </p>
            </div>

            <div class="icon">
                <i class="fab fa-git-alt"></i>
            </div>
        </div>
    </div>

    <!-- Current Branch -->
    <div class="col-md-3">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>
                    {{ $git['branch'] ?? 'Unknown' }}
                </h3>
                <p>
                    Current Branch
                </p>
            </div>

            <div class="icon">
                <i class="fas fa-code-branch"></i>
            </div>
        </div>
    </div>

    <!-- Git Status -->
    <div class="col-md-3">
        <div class="small-box {{ ($git['status'] ?? '') == 'Connected' ? 'bg-success' : 'bg-danger' }}">
            <div class="inner">
                <h3>
                    <i
                        class="fas {{ ($git['status'] ?? '') == 'Connected' ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
                </h3>

                <p>
                    {{ $git['status'] ?? 'Disconnected' }}
                </p>
            </div>

            <div class="icon">
                <i class="fas fa-network-wired"></i>
            </div>
        </div>
    </div>

    <!-- Git Commands -->
    <div class="col-md-3">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>
                    {{ $git['commits'] ?? 0 }}
                </h3>

                <p>
                    Git Commands
                </p>
            </div>

            <div class="icon">
                <i class="fas fa-terminal"></i>
            </div>
        </div>
    </div>
</div>

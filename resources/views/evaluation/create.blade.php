<!DOCTYPE html>
<html>
<head>
    <title>Evaluation Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .criterion { background: #fff; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);}
        .question { margin-bottom: 15px; }
        .question label { font-weight: 500; }
        textarea { resize: vertical; }
        h1 { text-align: center; margin-bottom: 30px; }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1>ቅጽ 001 Evaluation Form</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('evaluation.store') }}">
        @csrf
        @foreach($criteria as $criterion)
            <div class="criterion">
                <h4>{{ $criterion->title }} <small>({{ $criterion->points }} points)</small></h4>
                @foreach($criterion->questions as $question)
                    <div class="question">
                        <label>{{ $question->question }}</label>
                        <input type="number" class="form-control mb-2" name="scores[{{ $question->id }}]" min="0" max="{{ $criterion->points }}" placeholder="Enter score">
                        <textarea class="form-control" name="comments[{{ $question->id }}]" placeholder="Comment (optional)" rows="2"></textarea>
                    </div>
                @endforeach
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary w-100">Submit Evaluation</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

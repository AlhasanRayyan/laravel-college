@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <div class="offset-md-2 col-md-8">
       @if (isset($task))

  <div class="card">
        <div class="card-header">
           تحديث المهمة
        </div>
        <div class="card-body">
            <!-- New Task Form -->
            <form action="{{ route('tasks.update')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $task->id }}">
                <!-- Task Name -->
                <div class="mb-3">
                    <label for="task-name" class="form-label">المهمة</label>
                    <input type="text" name="name" id="task-name" class="form-control" value="{{ $task->name }}">
                </div>

                <!-- Add Task Button -->
                <div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus me-2"></i>تحديث المهمة
                    </button>
                </div>
            </form>
        </div>
    </div>
     
       @else
       <div class="card">
        <div class="card-header">
            مهمة جديدة
        </div>
        <div class="card-body">
            <!-- New Task Form -->
            <form action="{{ route('tasks.create') }}" method="POST">
                @csrf
                <!-- Task Name -->
                <div class="mb-3">
                    <label for="task-name" class="form-label">المهمة</label>
                    <input type="text" name="name" id="task-name" class="form-control" value="">
                </div>

                <!-- Add Task Button -->
                <div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus me-2"></i>  إضافة مهمة
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif

        <!-- Current Tasks -->
        <div class="card mt-4">
            <div class="card-header">
                المهام الحالية
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>المهمة</th>
                            <th>العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ( $tasks as $task )
                       <tr>
                        <td> {{ $task->name }} </td>
                        <td>
                            <form action="{{ route('tasks.destroy' , $task->id) }}" method="POST" class="d-inline">
                              
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash me-2"></i> حذف 
                                </button>
                            </form>
                            <form action="{{ route('tasks.edit' , $task->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-info">
                                    <i class="fa fa-info me-2"></i> تعديل  
                                </button>
                            </form>
                        </td>
                    </tr>
                       @endforeach
                     
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
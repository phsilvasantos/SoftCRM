@extends('layouts.base')

@section('title', 'Welcome in SoftCRM')

@section('caption', 'Welcome in SoftCRM')

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-primary text-center no-boder bg-color-green">
                <div class="panel-body">
                    <i class="fa fa-rocket fa-5x"></i>
                    <h3>{{ \App\Client::countClients() ? : 0 }}</h3>
                </div>
                <a href="{{ route('clients') }}" style="text-decoration: none">
                    <div class="panel-footer back-footer-green">
                        All clients
                        <i class="fa fa-arrow-circle-right"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-primary text-center no-boder bg-color-blue">
                <div class="panel-body">
                    <i class="fa fa-compass fa-5x"></i>
                    <h3>{{ \App\Companies::countCompanies() ? : 0 }} </h3>
                </div>
                <a href="#" style="text-decoration: none">
                    <div class="panel-footer back-footer-blue">
                        All companies
                        <i class="fa fa-arrow-circle-right"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-primary text-center no-boder bg-color-red">
                <div class="panel-body">
                    <i class="fa fa fa-users fa-5x"></i>
                    <h3>{{ \App\Employees::countEmployees() ? : 0 }} </h3>
                </div>
                <a href="{{ route('employees') }}" style="text-decoration: none">
                    <div class="panel-footer back-footer-red">
                        All employees
                        <i class="fa fa-arrow-circle-right"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12">
            <div class="panel panel-primary text-center no-boder bg-color-brown">
                <div class="panel-body">
                    <i class="fa fa-paperclip fa-5x"></i>
                    <h3>{{ \App\Deals::countDeals() ? : 0 }} </h3>
                </div>
                <a href="{{ route('deals') }}" style="text-decoration: none">
                    <div class="panel-footer back-footer-brown">
                        All deals
                        <i class="fa fa-arrow-circle-right"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Latest tasks <span class="badge"> {{ \App\Tasks::countTasks() ? : '0' }}</span></button>
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        @if(count($dataWithAllTasks) > 0)
                        @foreach ($dataWithAllTasks as $result)
                            <a href="{{ URL::to('tasks/' . $result->id) }}" class="list-group-item">
                                <span class="badge badge" style="background-color: #428bca !important;">{{ $result->created_at->diffForHumans() }}</span>
                                <i class="fa fa-fw fa-comment"></i> {{ $result->name }}
                            </a>
                        @endforeach
                        @else
                           There is no tasks.
                        @endif
                    </div>
                    <div class="text-right">
                        <a href="{{ URL::to('tasks') }}">More Tasks <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Latest invoices <span class="badge"> {{ \App\Invoices::countInvoices() ? : '0' }}</span>
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        @if(count($dataWithAllInvoices) > 0)
                            @foreach ($dataWithAllInvoices as $result)
                                <a href="{{ URL::to('invoices/' . $result->id) }}" class="list-group-item">
                                    <span class="badge badge" style="background-color: #428bca !important;">{{ $result->created_at->diffForHumans() }}</span>
                                    <i class="fa fa-fw fa-money"></i> {{ $result->companies->name }} | {{ $result->client->full_name }}
                                    <span class="badge badge-secondary" style="background-color: #e91e63 !important; margin-right: 10px">
                                            {{ \ClickNow\Money\Money::{config('crm_settings.currency')}($result->cost) }}
                                        </span>
                                    <span class="badge badge-secondary" style="background-color: #795548 !important; margin-right: 10px">
                                            {{ $result->amount }} pieces
                                        </span>
                                </a>
                            @endforeach
                        @else
                            There is no invoices.
                        @endif
                    </div>
                    <div class="text-right">
                        <a href="{{ URL::to('invoices') }}">More Invoices <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Latest add products <span class="badge"> {{ \App\Products::countProducts() ? : '0' }}</span></button>
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        @if(count($dataWithAllProducts) > 0)
                            @foreach ($dataWithAllProducts as $result)
                                <a href="{{ URL::to('products/' . $result->id) }}" class="list-group-item">
                                    <span class="badge badge" style="background-color: #428bca !important;">{{ $result->created_at->diffForHumans() }}</span>
                                    <span class="badge badge" style="background-color: #298a15 !important;">
                                        {{ \ClickNow\Money\Money::{config('crm_settings.currency')}($result->price) }} [{{ $result->count }}]</span>
                                    <i class="fa fa-fw fa-product-hunt"></i> {{ $result->name }}
                                </a>
                            @endforeach
                        @else
                            There is no tasks.
                        @endif
                    </div>
                    <div class="text-right">
                        <a href="{{ URL::to('products') }}">More products <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
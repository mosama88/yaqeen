<div>
    <div class="col-6 mt-4">
        <div class="form-icon position-relative">
            <i data-feather="search" class="fea icon-sm icons"></i>
            <input wire:model.live="name" id="subject" class="form-control ps-5" placeholder="بحث بإسم الخزنه :" autocomplete="off">
        </div>
    </div>
    <div class="col-12 mt-4">
        <div class="table-responsive bg-white shadow rounded">
            <table class="table mb-0 table-center">
                <thead class="bg-light rounded-top">
                    <tr>
                        <th class="border-bottom py-3" style="min-width:20px ">#</th>
                        <th>أسم الوحدة</th>
                        <th>هل رئيسية</th>
                        <th>حالة التفعيل</th>
                        <th>انشاء بواسطة</th>
                        <th>تحديث بواسطة</th>
                        <th>الأجراءات</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($data as $info)
                        <tr class="shop-list">
                            <th class="py-3">{{ $loop->iteration }}</th>
                            <td>
                                <a href="javascript:void(0)" class="text-dark">{{ $info->name }}</a>
                            </td>
                            <td>
                                @if ($info->is_master->value == 1)
                                    <span>{{ $info->is_master->label() }}</span>
                                @else
                                    <span>{{ $info->is_master->label() }}</span>
                                @endif
                            </td>
                            <td>
                                @if ($info->active->value == 1)
                                    <span
                                        class="badge badge-link rounded-pill bg-primary">{{ $info->active->label() }}</span>
                                @else
                                    <span
                                        class="badge badge-link rounded-pill bg-danger">{{ $info->active->label() }}</span>
                                @endif
                            </td>
                            <td>{{ $info->createdBy->name }}</td>
                            <td>
                                @if ($info->updated_by > 0)
                                    {{ $info->updatedBy->name }}
                                @else
                                    لا يوجد تحديث
                                @endif

                            </td>
                            <td>
                                @include('dashboard.partials.actions', [
                                    'name' => 'invUnits',
                                    'name_id' => $info,
                                ])
                            </td>
                        </tr>
                    @empty
                        <div class="my-4 d-block p-3 mx-auto">
                            <div class="alert alert-primary alert-pills" role="alert">
                                <span class="badge rounded-pill bg-info me-1">ملحوظة</span>
                                <span class="content"> !عفوآ لا توجد بيانات لعرضها </span>
                            </div>
                        </div>
                    @endforelse

                </tbody>
            </table>

            <div class="row">
                {{ $data->links() }}
            </div>
        </div>
    </div><!--end col-->
</div>

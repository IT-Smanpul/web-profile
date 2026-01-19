<div class="shadow-base-300/10 rounded-box bg-base-100 flex gap-4 p-6 shadow-md max-xl:flex-col">
  <div class="flex flex-1 gap-4 max-sm:flex-col">
    <div class="flex flex-1 flex-col gap-4">
      <div class="text-base-content flex items-center gap-2">
        <div class="avatar avatar-placeholder">
          <div class="bg-base-200 rounded-field size-9">
            <span class="icon-[tabler--eye] size-5"></span>
          </div>
        </div>
        <h5 class="text-lg font-medium">Fasilitas</h5>
      </div>
      <div>
        <div class="text-base-content text-xl font-semibold">{{ $facilityCount }}</div>
      </div>
    </div>
    <div class="divider sm:divider-horizontal"></div>
    <div class="flex flex-1 flex-col gap-4">
      <div class="text-base-content flex items-center gap-2">
        <div class="avatar avatar-placeholder">
          <div class="bg-base-200 rounded-field size-9">
            <span class="icon-[tabler--mouse] size-6"></span>
          </div>
        </div>
        <h5 class="text-lg font-medium">Prestasi</h5>
      </div>
      <div>
        <div class="text-base-content text-xl font-semibold">{{ $achievementCount }}</div>
      </div>
    </div>
  </div>
  <div class="divider xl:divider-horizontal"></div>
  <div class="flex flex-1 gap-4 max-sm:flex-col">
    <div class="flex flex-1 flex-col gap-4">
      <div class="text-base-content flex items-center gap-2">
        <div class="avatar avatar-placeholder">
          <div class="bg-base-200 rounded-field size-9">
            <span class="icon-[tabler--chart-bar] size-6"></span>
          </div>
        </div>
        <h5 class="text-lg font-medium">Guru dan Staff</h5>
      </div>
      <div>
        <div class="text-base-content text-xl font-semibold">{{ $employeeCount }}</div>
      </div>
    </div>
    <div class="divider sm:divider-horizontal"></div>
    <div class="flex flex-1 flex-col gap-4">
      <div class="text-base-content flex items-center gap-2">
        <div class="avatar avatar-placeholder">
          <div class="bg-base-200 rounded-field size-9">
            <span class="icon-[tabler--currency-dollar] size-6"></span>
          </div>
        </div>
        <h5 class="text-lg font-medium">Berita</h5>
      </div>
      <div>
        <div class="text-base-content text-xl font-semibold">{{ $articleCount }}</div>
      </div>
    </div>
  </div>
</div>

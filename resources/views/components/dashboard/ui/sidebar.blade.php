<aside
  class="overlay overlay-open:translate-x-0 drawer drawer-start sm:w-75 inset-y-0 start-0 hidden h-full [--auto-close:lg] lg:z-50 lg:block lg:translate-x-0 lg:shadow-none"
  id="layout-sidebar" aria-label="Sidebar" tabindex="-1">
  <div class="drawer-body border-base-content/20 h-full border-e p-0">
    <div class="flex h-full max-h-full flex-col">
      <button class="btn btn-text btn-circle btn-sm absolute end-3 top-3 lg:hidden" data-overlay="#layout-sidebar"
        type="button" aria-label="Close">
        <span class="icon-[tabler--x] size-4.5"></span>
      </button>
      <div class="text-base-content border-base-content/20 flex flex-col items-center gap-4 border-b px-4 py-6">
        <div class="avatar">
          <div class="size-17 rounded-full">
            <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('img/avatars/8.png') }}"
              alt="avatar" />
          </div>
        </div>
        <div class="text-center">
          <h3 class="text-base-content text-lg font-semibold">{{ Auth::user()->name }}</h3>
          <p class="text-base-content/80">{{ Auth::user()->username }}</p>
        </div>
        <div class="flex gap-3">
          <a class="link size-4.5" href="#" aria-label="Facebook Link">
            <span class="icon-[tabler--brand-facebook] size-4.5"></span>
          </a>
          <a class="link size-4.5" href="#" aria-label="Instagram Link">
            <span class="icon-[tabler--brand-instagram] size-4.5"></span>
          </a>
          <a class="link size-4.5" href="#" aria-label="X Link">
            <span class="icon-[tabler--brand-twitter] size-4.5"></span>
          </a>
          <a class="link size-4.5" href="#" aria-label="Github Link">
            <span class="icon-[tabler--brand-github] size-4.5"></span>
          </a>
        </div>
      </div>
      <div class="h-full overflow-y-auto">
        <ul class="accordion menu menu-sm gap-1 p-3">
          <!-- Accordion Menu Item (Level 0) -->
          <li class="active accordion-item" id="dashboard">
            <button
              class="accordion-toggle accordion-item-active:bg-neutral/10 inline-flex w-full items-center p-2 text-start text-sm font-normal"
              aria-controls="dashboard-collapse-dashboard" aria-expanded="true">
              <span class="icon-[tabler--dashboard] size-4.5"></span>
              <span class="grow">Dashboard</span>
              <span
                class="icon-[tabler--chevron-right] accordion-item-active:rotate-90 size-4.5 shrink-0 transition-transform duration-300 rtl:rotate-180"></span>
            </button>
            <div class="accordion-content mt-1 block w-full overflow-hidden transition-[height] duration-300"
              id="dashboard-collapse-dashboard" role="region" aria-labelledby="dashboard">
              <ul class="space-y-1">
                <!-- Simple Link Item (for nested items) -->
                <li>
                  <a class="menu-active inline-flex w-full items-center px-2" href="common-dashboard-free.html">
                    <span>Default</span>
                  </a>
                </li>

                <!-- Simple Link Item (for nested items) -->
                <li>
                  <a class="inline-flex w-full items-center px-2"
                    href="https://demos.flyonui.com/templates/html/dashboard-default/common-dashboard.html"
                    target="_blank">
                    <span class="grow">Analytics</span>
                    <span class="badge badge-primary badge-sm badge-soft">Pro</span>
                  </a>
                </li>

                <!-- Simple Link Item (for nested items) -->
                <li>
                  <a class="inline-flex w-full items-center px-2"
                    href="https://demos.flyonui.com/templates/html/dashboard-ecommerce/dashboard-ecommerce.html"
                    target="_blank">
                    <span class="grow">eCommerce</span>
                    <span class="badge badge-primary badge-sm badge-soft">Pro</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <!-- Section Divider -->
          <li
            class="text-base-content/50 before:bg-base-content/20 mt-2 p-2 text-xs uppercase before:absolute before:-start-3 before:top-1/2 before:h-0.5 before:w-2.5">
            Menu Utama
          </li>

          <li>
            <a class="px-2" href="https://demos.flyonui.com/templates/html/dashboard-default/pages-faq.html"
              target="_blank">
              <span class="icon-[tabler--news] size-4.5"></span>
              <span class="grow">Berita</span>
              <span class="badge badge-primary badge-sm badge-soft">Pro</span>
            </a>
          </li>
          <li>
            <a class="px-2" href="https://demos.flyonui.com/templates/html/dashboard-default/pages-faq.html"
              target="_blank">
              <span class="icon-[tabler--award] size-4.5"></span>
              <span class="grow">Prestasi</span>
              <span class="badge badge-primary badge-sm badge-soft">Pro</span>
            </a>
          </li>
          <li>
            <a class="px-2" href="https://demos.flyonui.com/templates/html/dashboard-default/pages-faq.html"
              target="_blank">
              <span class="icon-[tabler--building] size-4.5"></span>
              <span class="grow">Fasilitas</span>
              <span class="badge badge-primary badge-sm badge-soft">Pro</span>
            </a>
          </li>
          <li>
            <a class="px-2" href="https://demos.flyonui.com/templates/html/dashboard-default/pages-faq.html"
              target="_blank">
              <span class="icon-[tabler--users] size-4.5"></span>
              <span class="grow">Guru dan Staff</span>
              <span class="badge badge-primary badge-sm badge-soft">Pro</span>
            </a>
          </li>

          <!-- Section Divider -->
          <li
            class="text-base-content/50 before:bg-base-content/20 mt-2 p-2 text-xs uppercase before:absolute before:-start-3 before:top-1/2 before:h-0.5 before:w-2.5">
            Pengaturan
          </li>

          <!-- Regular Menu Item (Level 0) -->
          <li>
            <a class="px-2" href="https://demos.flyonui.com/templates/html/dashboard-default/form-validation.html"
              target="_blank">
              <span class="icon-[tabler--checklist] size-4.5"></span>
              <span class="grow">Form Validation</span>
              <span class="badge badge-primary badge-soft badge-sm">Pro</span>
            </a>
          </li>

          <li>
            <a class="inline-flex w-full items-center px-2"
              href="https://demos.flyonui.com/templates/html/dashboard-default/pages-account-settings-security.html"
              target="_blank">
              <span class="icon-[tabler--message] size-4.5"></span>
              <span class="grow">Informasi Umum</span>
              <span class="badge badge-primary badge-sm badge-soft">Pro</span>
            </a>
          </li>

          <li>
            <a class="inline-flex w-full items-center px-2"
              href="https://demos.flyonui.com/templates/html/dashboard-default/pages-account-settings-security.html"
              target="_blank">
              <span class="icon-[tabler--message] size-4.5"></span>
              <span class="grow">Informasi Umum</span>
              <span class="badge badge-primary badge-sm badge-soft">Pro</span>
            </a>
          </li>

          <li class="accordion-item" id="app-user-view">
            <button
              class="accordion-toggle accordion-item-active:bg-neutral/10 inline-flex w-full items-center p-2 text-start text-sm font-normal"
              aria-controls="view-collapse-app-user-view" aria-expanded="true">
              <span class="icon-[tabler--book] size-4.5"></span>
              <span class="grow">Struktur Organisasi</span>
              <span
                class="icon-[tabler--chevron-right] accordion-item-active:rotate-90 size-4.5 shrink-0 transition-transform duration-300 rtl:rotate-180"></span>
            </button>
            <div class="accordion-content mt-1 hidden w-full overflow-hidden transition-[height] duration-300"
              id="view-collapse-app-user-view" role="region" aria-labelledby="app-user-view">
              <ul class="space-y-1">
                <!-- Simple Link Item (for nested items) -->
                <li>
                  <a class="inline-flex w-full items-center px-2"
                    href="https://demos.flyonui.com/templates/html/dashboard-default/app-user-view-account.html"
                    target="_blank">
                    <span class="icon-[tabler--settings] size-4.5"></span>
                    <span>Kepala Sekolah</span>
                  </a>
                </li>

                <!-- Simple Link Item (for nested items) -->
                <li>
                  <a class="inline-flex w-full items-center px-2"
                    href="https://demos.flyonui.com/templates/html/dashboard-default/app-user-view-security.html"
                    target="_blank">
                    <span class="icon-[tabler--settings] size-4.5"></span>
                    <span>Wakil Kepala Sekolah</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>

          <li>
            <a class="inline-flex w-full items-center px-2"
              href="https://demos.flyonui.com/templates/html/dashboard-default/pages-account-settings-security.html"
              target="_blank">
              <span class="icon-[tabler--message] size-4.5"></span>
              <span class="grow">Informasi Umum</span>
              <span class="badge badge-primary badge-sm badge-soft">Pro</span>
            </a>
          </li>

          <!-- Section Divider -->
          <li
            class="text-base-content/50 before:bg-base-content/20 mt-2 p-2 text-xs uppercase before:absolute before:-start-3 before:top-1/2 before:h-0.5 before:w-2.5">
            Applications</li>

          <!-- Accordion Menu Item (Level 0) -->
          {{--          <li class="accordion-item" id="app-user"> --}}
          {{--            <button --}}
          {{--              class="accordion-toggle accordion-item-active:bg-neutral/10 inline-flex w-full items-center p-2 text-start text-sm font-normal" --}}
          {{--              aria-controls="app-user-collapse-app-user" aria-expanded="true"> --}}
          {{--              <span class="text-bg-neutral rounded-field flex size-6 items-center justify-center"> --}}
          {{--                <span class="icon-[tabler--user] size-4.5"></span> --}}
          {{--              </span> --}}
          {{--              <span class="grow">User</span> --}}
          {{--              <span class="badge badge-primary badge-sm badge-soft me-2">Pro</span> --}}
          {{--              <span --}}
          {{--                class="icon-[tabler--chevron-right] accordion-item-active:rotate-90 size-4.5 shrink-0 transition-transform duration-300 rtl:rotate-180"></span> --}}
          {{--            </button> --}}
          {{--            <div class="accordion-content mt-1 hidden w-full overflow-hidden transition-[height] duration-300" --}}
          {{--              id="app-user-collapse-app-user" role="region" aria-labelledby="app-user"> --}}
          {{--              <ul class="accordion space-y-1"> --}}
          {{--                <!-- Simple Link Item (for nested items) --> --}}
          {{--                <li> --}}
          {{--                  <a class="inline-flex w-full items-center px-2" --}}
          {{--                    href="https://demos.flyonui.com/templates/html/dashboard-default/app-user-list.html" --}}
          {{--                    target="_blank"> --}}
          {{--                    <span>List</span> --}}
          {{--                  </a> --}}
          {{--                </li> --}}

          {{--                <!-- Accordion Menu Item (Level 1) --> --}}
          {{--                <li class="accordion-item" id="app-user-view"> --}}
          {{--                  <button --}}
          {{--                    class="accordion-toggle accordion-item-active:bg-neutral/10 inline-flex w-full items-center p-2 text-start text-sm font-normal" --}}
          {{--                    aria-controls="view-collapse-app-user-view" aria-expanded="true"> --}}
          {{--                    <span class="grow">View</span> --}}
          {{--                    <span --}}
          {{--                      class="icon-[tabler--chevron-right] accordion-item-active:rotate-90 size-4.5 shrink-0 transition-transform duration-300 rtl:rotate-180"></span> --}}
          {{--                  </button> --}}
          {{--                  <div class="accordion-content mt-1 hidden w-full overflow-hidden transition-[height] duration-300" --}}
          {{--                    id="view-collapse-app-user-view" role="region" aria-labelledby="app-user-view"> --}}
          {{--                    <ul class="space-y-1"> --}}
          {{--                      <!-- Simple Link Item (for nested items) --> --}}
          {{--                      <li> --}}
          {{--                        <a class="inline-flex w-full items-center px-2" --}}
          {{--                          href="https://demos.flyonui.com/templates/html/dashboard-default/app-user-view-account.html" --}}
          {{--                          target="_blank"> --}}
          {{--                          <span>Account</span> --}}
          {{--                        </a> --}}
          {{--                      </li> --}}

          {{--                      <!-- Simple Link Item (for nested items) --> --}}
          {{--                      <li> --}}
          {{--                        <a class="inline-flex w-full items-center px-2" --}}
          {{--                          href="https://demos.flyonui.com/templates/html/dashboard-default/app-user-view-security.html" --}}
          {{--                          target="_blank"> --}}
          {{--                          <span>Security</span> --}}
          {{--                        </a> --}}
          {{--                      </li> --}}

          {{--                      <!-- Simple Link Item (for nested items) --> --}}
          {{--                      <li> --}}
          {{--                        <a class="inline-flex w-full items-center px-2" --}}
          {{--                          href="https://demos.flyonui.com/templates/html/dashboard-default/app-user-view-billing.html" --}}
          {{--                          target="_blank"> --}}
          {{--                          <span>Billing & Plans</span> --}}
          {{--                        </a> --}}
          {{--                      </li> --}}

          {{--                      <!-- Simple Link Item (for nested items) --> --}}
          {{--                      <li> --}}
          {{--                        <a class="inline-flex w-full items-center px-2" --}}
          {{--                          href="https://demos.flyonui.com/templates/html/dashboard-default/app-user-view-notifications.html" --}}
          {{--                          target="_blank"> --}}
          {{--                          <span>Notifications</span> --}}
          {{--                        </a> --}}
          {{--                      </li> --}}

          {{--                      <!-- Simple Link Item (for nested items) --> --}}
          {{--                      <li> --}}
          {{--                        <a class="inline-flex w-full items-center px-2" --}}
          {{--                          href="https://demos.flyonui.com/templates/html/dashboard-default/app-user-view-connections.html" --}}
          {{--                          target="_blank"> --}}
          {{--                          <span>Connections</span> --}}
          {{--                        </a> --}}
          {{--                      </li> --}}
          {{--                    </ul> --}}
          {{--                  </div> --}}
          {{--                </li> --}}
          {{--              </ul> --}}
          {{--            </div> --}}
          {{--          </li> --}}
        </ul>
      </div>
    </div>
  </div>
</aside>

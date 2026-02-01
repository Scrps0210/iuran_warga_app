<header x-data="{ dropDownOpen: false }"
    class="sticky top-0 z-999 flex w-full bg-white drop-shadow-1 dark:bg-gray-800 dark:drop-shadow-none">
    <div class="flex flex-grow items-center justify-between px-4 py-4 shadow-2 md:px-6 2xl:px-11">
        <div class="flex items-center gap-2 sm:gap-4 lg:hidden">
            <!-- Hamburger Toggle BTN -->
            <button
                class="z-99999 block rounded-sm border border-stroke bg-white p-1.5 shadow-sm dark:border-strokedark dark:bg-boxdark lg:hidden"
                @click.stop="sidebarToggle = !sidebarToggle">
                <span class="relative block h-5.5 w-5.5 cursor-pointer">
                    <span class="du-block absolute right-0 h-full w-full">
                        <span
                            class="relative top-0 left-0 my-1 block h-0.5 w-0 rounded-sm bg-black delay-[0] duration-200 ease-in-out dark:bg-white"
                            :class="{ '!w-full delay-300': !sidebarToggle }"></span>
                        <span
                            class="relative top-0 left-0 my-1 block h-0.5 w-0 rounded-sm bg-black delay-150 duration-200 ease-in-out dark:bg-white"
                            :class="{ 'delay-400 !w-full': !sidebarToggle }"></span>
                        <span
                            class="relative top-0 left-0 my-1 block h-0.5 w-0 rounded-sm bg-black delay-200 duration-200 ease-in-out dark:bg-white"
                            :class="{ '!w-full delay-500': !sidebarToggle }"></span>
                    </span>
                    <span class="absolute right-0 h-full w-full rotate-45">
                        <span
                            class="absolute left-2.5 top-0 block h-full w-0.5 rounded-sm bg-black delay-300 duration-200 ease-in-out dark:bg-white"
                            :class="{ '!h-0 !delay-[0]': !sidebarToggle }"></span>
                        <span
                            class="delay-400 absolute left-0 top-2.5 block h-0.5 w-full rounded-sm bg-black duration-200 ease-in-out dark:bg-white"
                            :class="{ '!h-0 !delay-200': !sidebarToggle }"></span>
                    </span>
                </span>
            </button>
            <!-- Hamburger Toggle BTN -->

            <a class="block flex-shrink-0 lg:hidden" href="{{ route('dashboard') }}">
                <img src="{{ asset('images/logo/logo-icon.svg') }}" alt="Logo" />
            </a>
        </div>

        <div class="hidden sm:block">
            <form action="#" method="POST">
                <div class="relative">
                    <button class="absolute left-0 top-1/2 -translate-y-1/2">
                        <svg class="fill-body hover:fill-primary dark:fill-bodydark dark:hover:fill-primary" width="20"
                            height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9.16666 3.33332C5.945 3.33332 3.33332 5.945 3.33332 9.16666C3.33332 12.3883 5.945 15 9.16666 15C12.3883 15 15 12.3883 15 9.16666C15 5.945 12.3883 3.33332 9.16666 3.33332ZM1.66666 9.16666C1.66666 5.02452 5.02452 1.66666 9.16666 1.66666C13.3088 1.66666 16.6667 5.02452 16.6667 9.16666C16.6667 13.3088 13.3088 16.6667 9.16666 16.6667C5.02452 16.6667 1.66666 13.3088 1.66666 9.16666Z"
                                fill="" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M13.2857 13.2857C13.6112 12.9603 14.1388 12.9603 14.4642 13.2857L18.0892 16.9107C18.4147 17.2362 18.4147 17.7638 18.0892 18.0892C17.7638 18.4147 17.2362 18.4147 16.9107 18.0892L13.2857 14.4642C12.9603 14.1388 12.9603 13.6112 13.2857 13.2857Z"
                                fill="" />
                        </svg>
                    </button>

                    <input type="text" placeholder="Type to search..."
                        class="w-full bg-transparent pl-9 pr-4 text-black focus:outline-none dark:text-white xl:w-125" />
                </div>
            </form>
        </div>

        <div class="flex items-center gap-3 2xsm:gap-7">
            <ul class="flex items-center gap-2 2xsm:gap-4">
                <!-- Dark Mode Toggler -->
                <li>
                    <label class="relative m-0 block h-7.5 w-14 rounded-full bg-stroke dark:bg-gray-700">
                        <input type="checkbox" :checked="darkMode" @change="darkMode = !darkMode"
                            class="absolute top-0 z-50 m-0 h-full w-full cursor-pointer opacity-0">
                        <span
                            class="absolute top-1/2 left-[3px] flex h-6 w-6 -translate-y-1/2 translate-x-0 items-center justify-center rounded-full bg-white shadow-switcher duration-75 ease-linear"
                            :class="darkMode && '!right-[3px] !translate-x-full'">
                            <span class="dark:hidden">
                                <svg class="fill-current" width="16" height="16" viewBox="0 0 24 24">
                                    <path d="M12 21a9 9 0 1 1 0-18 9 9 0 0 1 0 18zm0-2a7 7 0 1 0 0-14 7 7 0 0 0 0 14z"
                                        fill="#fbc02d" stroke="none"></path>
                                    <!-- Simple sun icon for light mode -->
                                </svg>
                            </span>
                            <span class="hidden dark:inline-block">
                                <svg class="fill-current" width="16" height="16" viewBox="0 0 24 24">
                                    <path
                                        d="M12 3c-4.97 0-9 4.03-9 9s4.03 9 9 9 9-4.03 9-9c0-.46-.04-.92-.1-1.36-.98 1.37-2.58 2.26-4.4 2.26-3.03 0-5.5-2.47-5.5-5.5 0-1.82.89-3.42 2.26-4.4-.44-.06-.9-.1-1.36-.1z"
                                        fill="#fbc02d" stroke="none"></path>
                                    <!-- Simple moon icon -->
                                </svg>
                            </span>
                        </span>
                    </label>
                </li>
                <!-- Dark Mode Toggler -->

                <!-- Notification Menu Area -->
                <li class="relative" x-data="{ dropdownOpen: false, notifying: true }"
                    @click.outside="dropdownOpen = false">
                    <a class="relative flex h-8.5 w-8.5 items-center justify-center rounded-full border-[0.5px] border-stroke bg-gray hover:text-primary dark:border-strokedark dark:bg-meta-4 dark:text-white"
                        href="#" @click.prevent="dropdownOpen = ! dropdownOpen; notifying = false">
                        <span :class="notifying ? '' : 'hidden'"
                            class="absolute -top-0.5 right-0 z-1 h-2 w-2 rounded-full bg-meta-1">
                            <span
                                class="absolute -z-1 inline-flex h-full w-full animate-ping rounded-full bg-meta-1 opacity-75"></span>
                        </span>
                        <svg class="fill-current duration-300 ease-in-out" width="18" height="18" viewBox="0 0 18 18"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16.1999 14.9343L15.6374 14.0624C15.5249 13.8937 15.4687 13.7249 15.4687 13.528V7.67803C15.4687 6.01865 14.7655 4.47178 13.4718 3.31865C12.4312 2.39053 11.0812 1.7999 9.64678 1.6874V1.1249C9.64678 0.787402 9.36553 0.478027 8.9999 0.478027C8.6624 0.478027 8.35303 0.759277 8.35303 1.1249V1.65928C5.33428 2.08115 2.9999 4.66865 2.9999 7.67803V13.5562C2.9999 13.753 2.94365 13.9218 2.83115 14.0905L2.26865 14.9343C2.12803 15.1593 2.12803 15.4124 2.2124 15.6655C2.3249 15.9187 2.52178 16.1155 2.7749 16.1155H15.6937C15.9468 16.1155 16.1718 15.9187 16.2562 15.6655C16.3405 15.4124 16.3405 15.1593 16.1999 14.9343ZM9.28115 17.4374C8.80303 17.4374 8.40928 17.0718 8.35303 16.678H10.2937C10.2374 17.0718 9.84365 17.4374 9.36553 17.4374H9.28115Z"
                                fill="" />
                        </svg>
                    </a>

                    <!-- Dropdown Start -->
                    <div x-show="dropdownOpen"
                        class="absolute -right-27 mt-2.5 flex h-90 w-75 flex-col rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark sm:right-0 sm:w-80">
                        <!-- Dropdown Content (Simplified) -->
                        <div class="px-4 py-3">
                            <h5 class="text-sm font-medium text-bodydark2">Notification</h5>
                        </div>
                        <ul class="flex h-auto flex-col overflow-y-auto">
                            <!-- Example Notification -->
                            <li>
                                <a class="flex flex-col gap-2.5 border-t border-stroke px-4 py-3 hover:bg-gray-2 dark:border-strokedark dark:hover:bg-meta-4"
                                    href="#">
                                    <p class="text-sm">
                                        <span class="text-black dark:text-white">Admin Update</span>
                                        System updated successfully.
                                    </p>
                                    <p class="text-xs">12 May, 2025</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Dropdown End -->
                </li>
            </ul>

            <!-- User Area -->
            <div class="relative" x-data="{ dropdownOpen: false }" @click.outside="dropdownOpen = false">
                <a class="flex items-center gap-4" href="#" @click.prevent="dropdownOpen = ! dropdownOpen">
                    <span class="hidden text-right lg:block">
                        <span class="block text-sm font-medium text-black dark:text-white">Admin User</span>
                        <span class="block text-xs">Administrator</span>
                    </span>

                    <span class="h-12 w-12 rounded-full">
                        <img src="{{ asset('images/user/owner.jpg') }}" alt="User" class="rounded-full" />
                    </span>

                    <svg class="hidden fill-current sm:block" :class="dropdownOpen ? 'rotate-180' : ''" width="12"
                        height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M0.410765 0.910734C0.736202 0.585297 1.26384 0.585297 1.58928 0.910734L6.00002 5.32148L10.4108 0.910734C10.7362 0.585297 11.2638 0.585297 11.5893 0.910734C11.9147 1.23617 11.9147 1.76381 11.5893 2.08924L6.58928 7.08924C6.26384 7.41468 5.7362 7.41468 5.41077 7.08924L0.410765 2.08924C0.0853277 1.76381 0.0853277 1.23617 0.410765 0.910734Z"
                            fill="" />
                    </svg>
                </a>

                <!-- Dropdown Start -->
                <div x-show="dropdownOpen"
                    class="absolute right-0 mt-4 flex w-62.5 flex-col rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
                    <ul class="flex flex-col gap-5 border-b border-stroke px-6 py-7.5 dark:border-strokedark">
                        <li>
                            <a href="#"
                                class="flex items-center gap-3.5 text-sm font-medium duration-300 ease-in-out hover:text-primary lg:text-base">
                                <svg class="fill-current" width="22" height="22" viewBox="0 0 22 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.0098 7.35625L17.2223 7.35625C17.2223 6.66875 17.2223 6.01563 17.2223 5.39688C17.2223 2.75 15.0567 0.584375 12.4442 0.584375C9.8317 0.584375 7.66608 2.75 7.66608 5.39688C7.66608 6.01563 7.66608 6.66875 7.66608 7.35625L5.87858 7.35625C3.85045 7.35625 2.30358 8.90313 2.30358 10.9313L2.30358 17.9438C2.30358 19.9719 3.85045 21.5188 5.87858 21.5188L19.0442 21.5188C21.0723 21.5188 22.5855 19.9719 22.5855 17.9438L22.5855 10.9313C22.5855 8.90313 21.0379 7.35625 19.0098 7.35625ZM11.0005 5.39688C11.0005 4.60625 11.6536 3.95313 12.4442 3.95313C13.2348 3.95313 13.8879 4.60625 13.8879 5.39688C13.8879 6.01563 13.8879 6.66875 13.8879 7.35625L11.0005 7.35625C11.0005 6.66875 11.0005 6.01563 11.0005 5.39688ZM19.2505 17.9438C19.2505 18.15 19.1473 18.2531 18.9755 18.2531L5.94733 18.2531C5.77545 18.2531 5.63795 18.15 5.63795 17.9438L5.63795 10.9313C5.63795 10.725 5.77545 10.6219 5.94733 10.6219L19.0098 10.6219C19.1817 10.6219 19.2848 10.725 19.2848 10.9313L19.2848 17.9438L19.2505 17.9438Z"
                                        fill="currentColor"></path>
                                </svg>
                                My Profile
                            </a>
                        </li>
                    </ul>
                    <button
                        class="flex items-center gap-3.5 px-6 py-4 text-sm font-medium duration-300 ease-in-out hover:text-primary lg:text-base">
                        <svg class="fill-current" width="22" height="22" viewBox="0 0 22 22" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20.2131 15.8456L19.4568 15.1238C19.3193 14.9175 19.2162 14.7113 19.2162 14.4706V7.32063C19.2162 5.2925 18.3568 3.40188 16.7756 1.9925C15.5037 0.858125 13.8537 0.13625 12.1006 0L11.4131 0.653125C11.6881 0.378125 11.6881 -0.06875 11.4131 -0.34375C11.1381 -0.61875 10.6912 -0.61875 10.4162 -0.34375L6.635 -3.95313C6.36 -4.22812 5.91312 -4.22812 5.63812 -3.95313C5.36312 -3.67813 5.36312 -3.23125 5.63812 -2.95625L9.62562 0.859375L2.83812 7.32063V14.4706C2.83812 14.7113 2.76937 14.9175 2.63187 15.1238L1.87562 15.8456C1.66937 16.1206 1.66937 16.43 1.7725 16.7394C1.91 17.0488 2.15062 17.2894 2.46 17.2894H19.7318C19.9725 17.2894 20.2818 17.0144 20.3506 16.7394C20.4881 16.43 20.4194 16.1206 20.2131 15.8456ZM11.4131 19.3519C10.8287 19.3519 10.3475 18.905 10.2787 18.4237H11.5162C11.4819 18.905 11.0006 19.3519 10.4162 19.3519Z"
                                fill="currentColor"></path>
                        </svg>
                        Log Out
                    </button>
                </div>
                <!-- Dropdown End -->
            </div>
            <!-- User Area -->
        </div>
    </div>
</header>
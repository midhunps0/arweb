<div x-show="tab === 1 " class="flex flex-col gap-4">
    <div class="flex justify-end ">
        <a href="" @click.prevent="tab -= 1"
            class="flex rtl:flex-row-reverse justify-center right-0 items-center mt-5 md:mt-10 lg:mt-10 rounded-full bg-blue w-16 text-white p-2">
            <x-easyadmin::display.icon icon="icons.arrow-left" height="h-3" width="w-3" />
            <p class="text-xs">Back</p>
        </a>
    </div>
    <div x-data="{
            selected: false
        }">
        <form method="POST" action="">
            @csrf
            <p class="mt-base font-bold">Select Preffered Date </p>
            <div class="mt-6">
                <ul class="flex flex-row lg:gap-x-1 xl:justify-between overflow-x-scroll py-2">
                    <li @click.prevent="selected = true"><x-booking-date-component /></li>
                    <li @click.prevent="selected = true"><x-booking-date-component :month="'Mar'" :date="'29'" :day="'Friday'" /></li>
                    <li @click.prevent="selected = true"><x-booking-date-component :month="'Mar'" :date="'30'"
                            :day="'Saturday'" /></li>
                    <li @click.prevent="selected = true"><x-booking-date-component :month="'Mar'" :date="'31'"
                            :day="'Sunday'" /></li>
                    <li @click.prevent="selected = true"><x-booking-date-component :month="'Apr'" :date="'1'"
                            :day="'Monday'" /></li>
                    <li @click.prevent="selected = true"><x-booking-date-component :month="'Apr'" :date="'2'"
                            :day="'Tuesday'" /></li>
                    <li @click.prevent="selected = true"><x-booking-date-component :month="'Apr'" :date="'2'"
                            :day="'Wednesday'" /></li>
                    <li @click.prevent="selected = true"><x-booking-date-component :month="'Apr'" :date="'4'"
                            :day="'Thursday'" /></li>
                    <li @click.prevent="selected = true"><x-booking-date-component :month="'Apr'" :date="'5'"
                            :day="'Friday'" /></li>
                    <li @click.prevent="selected = true"><x-booking-date-component :month="'Apr'" :date="'6'"
                            :day="'Saturday'" /></li>
                </ul>

            </div>



            <p class="mt-6 font-bold">Select Preffered Time </p>
            <ul class="grid grid-cols-3 sm:grid-cols-5 lg:grid-cols-8 gap-y-6 lg:gap-x-4 xl:justify-between mt-4">
                <li @click.prevent="time = 'slot-1'"><x-booking-time-component /></li>
                <li @click.prevent="time = 'slot-2'"><x-booking-time-component :time="'9:15 AM'" /></li>
                <li @click.prevent="time = 'slot-3'"><x-booking-time-component :time="'9:30 AM'" /></li>
                <li @click.prevent="time = 'slot-4'"><x-booking-time-component :time="'9:45 AM'" /></li>
                <li @click.prevent="time = 'slot-5'"><x-booking-time-component :time="'10:00 AM'" /></li>
                <li @click.prevent="time = 'slot-6'"><x-booking-time-component :time="'10:15 AM'" /></li>
                <li @click.prevent="time = 'slot-7'"><x-booking-time-component :time="'10:30 AM'" /></li>
                <li @click.prevent="time = 'slot-8'"><x-booking-time-component :time="'10:45 AM'" /></li>
                <li @click.prevent="time = 'slot-9'"><x-booking-time-component :time="'11:00 AM'" /></li>
                <li @click.prevent="time = 'slot-10'"><x-booking-time-component :time="'11:15 AM'" /></li>
                <li @click.prevent="time = 'slot-11'"><x-booking-time-component :time="'11:30AM'" /></li>
                <li @click.prevent="time = 'slot-12'"><x-booking-time-component :time="'11:45 AM'" /></li>
                <li @click.prevent="time = 'slot-13'"><x-booking-time-component :time="'12:00 PM'" /></li>
                <li @click.prevent="time = 'slot-14'"><x-booking-time-component :time="'12:15 PM'" /></li>
                <li @click.prevent="time = 'slot-15'"><x-booking-time-component :time="'12:30 PM'" /></li>
                <li @click.prevent="time = 'slot-16'"><x-booking-time-component :time="'12:45 PM'" /></li>
                <li @click.prevent="time = 'slot-17'"><x-booking-time-component :time="'1:00 PM'" /></li>
                <li @click.prevent="time = 'slot-18'"><x-booking-time-component :time="'1:15 PM'" /></li>
                <li @click.prevent="time = 'slot-19'"><x-booking-time-component :time="'1:30 PM'" /></li>
                <li @click.prevent="time = 'slot-20'"><x-booking-time-component :time="'1:45 PM'" /></li>
                <li @click.prevent="time = 'slot-21'"><x-booking-time-component :time="'2:00 PM'" /></li>
                <li @click.prevent="time = 'slot-22'"><x-booking-time-component :time="'2:15 PM'" /></li>
                <li @click.prevent="time = 'slot-23'"><x-booking-time-component :time="'2:30 PM'" /></li>
                <li @click.prevent="time = 'slot-24'"><x-booking-time-component :time="'2:45 PM'" /></li>
                <li @click.prevent="time = 'slot-25'"><x-booking-time-component :time="'3:00 PM'" /></li>
                <li @click.prevent="time = 'slot-26'"><x-booking-time-component :time="'3:15 PM'" /></li>
                <li @click.prevent="time = 'slot-27'"><x-booking-time-component :time="'3:30 PM'" /></li>
                <li @click.prevent="time = 'slot-28'"><x-booking-time-component :time="'3:45 PM'" /></li>
                <li @click.prevent="time = 'slot-29'"><x-booking-time-component :time="'4:00 PM'" /></li>
                <li @click.prevent="time = 'slot-30'"><x-booking-time-component :time="'4:15 PM'" /></li>
                <li @click.prevent="time = 'slot-31'"><x-booking-time-component :time="'4:30 PM'" /></li>
                <li @click.prevent="time = 'slot-32'"><x-booking-time-component :time="'4:45 PM'" /></li>
            </ul>
            <span class="mt-10 flex justify-end" @click.prevent="tab = 2 "><x-booking-button-component /></span>
        </form>
    </div>

</div>

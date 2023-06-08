<div>
    <div class="text-center text-sm">
        日付を選択してください。本日から最大30日まで選択可能です。
    </div>
    <input id="calendar" class="block mt-1 mb-2 mx-auto"
        type="text"
        name="calendar"
        value="{{ $currentDate }}"
        wire:change="getDate($event.target.value)"
    />
    <div class="flex border border-green-400 mx-auto">
        <x-calendar-time />
        @for ($i = 0; $i < 7; $i++)
            <div class="w-32">
                <div class="py-1 px-2 border border-gray-200 text-center">{{ $currentWeek[$i]['day'] }}</div>
                <div class="py-1 px-2 border border-gray-200 text-center">{{ $currentWeek[$i]['dayOfWeek'] }}</div>
                @for ($j = 0; $j < 21; $j++)
                    @if ($events->isNotEmpty())
                        @if (!is_null($events->firstWhere(
                            'start_date',
                            $currentWeek[$i]['checkDay'] . " " . \Constant::EVENT_TIME[$j]
                        )))
                            @php
                                $eventInfo = $events->firstWhere('start_date', $currentWeek[$i]['checkDay'] . " " . \Constant::EVENT_TIME[$j]);
                                // 開始時間から終了時間を引いて、30分で割ることで何コマのイベントか算出。
                                $eventPeriod = \Carbon\Carbon::parse($eventInfo->start_date)->diffInMinutes($eventInfo->end_date) / 30;
                            @endphp
                            <div class="py-1 px-2 h-8 border border-gray-200 text-xs bg-blue-100">
                                {{ $eventInfo->name }}
                            </div>
                            <!-- イベントのコマ数が1コマより多い場合(1コマ目にはイベント名が入り、残りのコマは背景色のみ変更) -->
                            @if ($eventPeriod > 1)
                                @for ($k = 0; $k < $eventPeriod; $k++)
                                <div class="py-1 px-2 h-8 border border-gray-200 text-xs bg-blue-100"></div>
                                @endfor
                                @php
                                    // 増えたコマ分の時間帯を加える
                                    $j += $eventPeriod;
                                @endphp
                            @endif
                        @else
                            <div class="py-1 px-2 h-8 border border-gray-200"></div>
                        @endif
                    @else
                        <div class="py-1 px-2 h-8 border border-gray-200"></div>
                    @endif
                @endfor
            </div>
        @endfor
    </div>
</div>

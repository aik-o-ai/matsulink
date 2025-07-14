// calendar.js

import axios from "axios";
import { Calendar } from "@fullcalendar/core";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";

// カレンダーを表示させたいタグのidを取得
const calendarEl = document.getElementById("calendar");

// new Calender(カレンダーを表示させたいタグのid, {各種カレンダーの設定});
// "calendar"というidがないbladeファイルではエラーが出てしまうので、if文で除外。
if (calendarEl) {
    const calendar = new Calendar(calendarEl, {
        // プラグインの導入(import忘れずに)
        plugins: [dayGridPlugin, timeGridPlugin],

        // カレンダー表示
        initialView: "dayGridMonth", // 最初に表示させるページの形式
        headerToolbar: {
            // ヘッダーの設定
            // コンマのみで区切るとページ表示時に間が空かず、半角スペースで区切ると間が空く（半角があるかないかで表示が変わることに注意）
            start: "prev,next today", // ヘッダー左（前月、次月、今日の順番で左から配置）
            center: "title", // ヘッダー中央（今表示している月、年）
            end: "dayGridMonth,timeGridWeek", // ヘッダー右（月形式、時間形式）
        },
        height: "auto", // 高さをウィンドウサイズに揃える

        events: {
            url: "/calendar/get", // Laravel側ルートと一致させる
            method: "POST",
            extraParams: {
                _token: document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            failure: () => {
                alert("イベントの読み込みに失敗しました");
            },
        },

        //イベントクリック時に詳細ページへ移動
        eventClick: function (info) {
            const eventId = info.event.id; // LaravelのイベントID
            window.location.href = `/events/${eventId}`; // 詳細ページに遷移
        },
        events: "/calendar/get",
    });

    // カレンダーのレンダリング
    calendar.render();
}

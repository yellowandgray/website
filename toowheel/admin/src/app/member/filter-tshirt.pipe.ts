import { Pipe, PipeTransform } from '@angular/core';
@Pipe({
   name: 'filterTshirtMember'
})
export class filterTshirtMember implements PipeTransform {
     transform(events: any[], value: string): any {
    if (events) {
      if (!value) {
        return events;
      } else {
        return events.filter(obj => obj.t_shirt_status == value);
      }
    } else {
      return []
    }
  }
}